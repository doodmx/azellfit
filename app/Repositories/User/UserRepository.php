<?php

namespace App\Repositories\User;

use DB;
use Carbon\Carbon;
use App\Models\User\User;
use App\Interfaces\User\UserInterface;
use Illuminate\Database\QueryException;
use App\Interfaces\Helpers\StorageInterface;
use App\Exceptions\Helpers\DatabaseException;
use App\Exceptions\Partner\RoleNotFoundException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserRepository implements UserInterface
{
    protected $user;
    use AuthenticatesUsers;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
        $this->user = app(User::class);
    }


    public function paginate($filter)
    {
        $users = $this->user;

        if (isset($filter['role'])) {
            if ($filter['role'] == 'pending') {
                $users = $users->where('password', null)
                    ->whereHas('roles', function ($query) {
                        return $query->where('name', 'Partner');
                    });;
            } else {
                $users = $users->filterByRole($filter['role']);
            }
        }

        if (isset($filter['partner_id'])) {
            $users = $users->where('partner_id', $filter['partner_id']);
        }

        $users = $users->with(['profile', 'roles', 'owner']);


        return $users;
    }


    public function login($credentials)
    {
        if (auth()->attempt(['email' => $credentials->email, 'password' => $credentials->password])) {
            return $this->sendLoginResponse();
        }
        return $this->sendFailedLoginResponse($credentials);
    }


    public function sendLoginResponse()
    {
        $user = auth()->user();
        $user->profile = auth()->user()->profile;

        $tokenResult = $user->createToken("Personal Access Token");
        $token = $tokenResult->token;
        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
            'user'         => auth()->user()
        ], 200);
    }

    public function showById($id)
    {

        try {

            $user = $this->user->with('profile')->findOrFail($id);


            return $user;

        } catch (ModelNotFoundException $e) {
            throw new RoleNotFoundException();
        }


    }


    public function register($data, $role)
    {
        try {
            DB::beginTransaction();

            $user = $this->user->create([
                'partner_id' => auth()->check() ? auth()->user()->id : null,
                'email'      => $data['email'],
                'password'   => isset($data['password']) ? $data['password'] : null,
                'locale'     => app()->getLocale()
            ]);

            $idCard = $this->storage->save('users/' . $user->id . '/', request()->file('id_card'));
            $proofResidence = $this->storage->save('users/' . $user->id . '/', request()->file('proof_residence'));

            $user->profile()->create([
                'name'            => $data['name'],
                'lastname'        => $data['lastname'],
                'phone_number'    => $data['phone_number'],
                'country_code'    => 'MX',
                'id_card'         => $idCard,
                'proof_residence' => $proofResidence,
            ]);

            $user->assignRole($role);

            DB::commit();

            return $user->load('profile', 'roles');


        } catch (QueryException $e) {
            DB::rollBack();
            throw new DatabaseException();
        }
    }


    public function changeRole($id, $role)
    {
        try {
            DB::beginTransaction();

            $user = $this->user->find($id);
            $user->syncRoles([$role]);


            DB::commit();

            return $user;
        } catch (QueryException $e) {
            DB::rollBack();
            throw new DatabaseException();
        }
    }

    public function update($id, $data)
    {

        try {


            DB::beginTransaction();

            $user = $this->showById($id);
            $user->email = value_instead($data, 'email', $user->email);
            $user->password = value_instead($data, 'password', $user->password);
            $user->save();


            if (isset($data['profile'])) {

                $profile = $data['profile'];

                $user->profile->name = value_instead($profile, 'name', $user->profile->name);
                $user->profile->lastname = value_instead($profile, 'lastname', $user->profile->lastname);
                $user->profile->phone_number = value_instead($profile, 'phone_number', $user->profile->phone_number);
                $user->profile->photo = value_instead($profile, 'photo', $user->profile->photo);
                $user->profile->id_card = value_instead($profile, 'id_card', $user->profile->id_card);
                $user->profile->proof_residence = value_instead($profile, 'proof_residence', $user->profile->proof_residence);
                $user->profile->save();

            }


            DB::commit();

            return $user;

        } catch (QueryException $e) {
            DB::rollBack();
            throw new DatabaseException();
        }

    }


    public function showAllByRole($role)
    {

        $partners = $this->user
            ->whereHas('roles', function ($query) use ($role) {
                return $query->where('name', $role);
            })
            ->with('profile')
            ->get();

        return $partners;
    }


    public function delete($id)
    {

        $user = $this->showById($id);
        $user->delete();

    }
}

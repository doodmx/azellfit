<?php

namespace App\Http\Controllers\User;

use App\DataTables\UserDatatable;
use App\Notifications\UserCreated;
use App\Http\Controllers\Controller;
use App\Interfaces\User\UserInterface;
use App\Notifications\CredentialsReset;
use App\Interfaces\Helpers\StorageInterface;
use App\Http\Requests\User\ShowProfileRequest;
use App\Interfaces\Helpers\EncryptionInterface;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Http\Requests\User\VerifyAccountRequest;
use App\Http\Requests\User\UpdateUserRoleRequest;
use App\Http\Requests\User\ResetCredentialsRequest;

class UserController extends Controller
{
    protected $users;

    public function __construct(UserInterface $userContract)
    {
        $this->users = $userContract;
    }


    public function index(UserDatatable $userDatatable)
    {
        return $userDatatable->render('admin.users.index');
    }


    public function changeRole($id,UpdateUserRoleRequest $request)
    {
        $this->users->changeRole($id, $request['role']);

        return response()->json(['message' => 'Rol cambiado correctamente'], 200);
    }


    public function verifyAccount($id, VerifyAccountRequest $request, EncryptionInterface $encryptionContract, StorageInterface $filesContract)
    {
        $data = $request->all();
        $files = $request->allFiles();
        $userFilesPath = 'users/' . $id . '/';


        $plainPassword = $encryptionContract->generateStrongPassword();
        $data['password'] = $encryptionContract->encryptString($plainPassword);


        if (isset($files['profile']['id_card'])) {
            $data['profile']['id_card'] = $filesContract->save($userFilesPath, $files['profile']['id_card']);
        }

        if (isset($files['profile']['proof_residence'])) {
            $data['profile']['proof_residence'] = $filesContract->save($userFilesPath, $files['profile']['proof_residence']);
        }

        $user = $this->users->update($id, $data);

        $user->notify(new UserCreated($plainPassword));

        return response()->json(['message' => 'Cuenta verificada correctamente. Se enviaron las credenciales de acceso a su correo electr??nico.'], 200);
    }

    public function showProfile($id, ShowProfileRequest $request)
    {
        $user = $this->users->showById($id);
        $idCard = explode('users/' . $id . '/', $user->profile->id_card);
        $proofResidence = explode('users/' . $id . '/', $user->profile->proof_residence);

        $isAdmin = $user->hasRole('Super Admin') || $user->hasPermissionTo('access_to_admin_panel');



        return view('admin.users.profile', [
            'layout'         => $isAdmin ? 'admin' : 'web',
            'user'           => $user,
            'idCard'         => value_instead($idCard, 1, $idCard[0]),
            'proofResidence' => value_instead($proofResidence, 1, $proofResidence[0])
        ]);

    }

    public function updateProfile($id, ShowProfileRequest $requestP, UpdateProfileRequest $request, StorageInterface $filesContract)
    {

        $data = $request->all();
        $files = $request->allFiles();
        $userFilesPath = 'users/' . $id . '/';


        if (isset($files['profile']['photo'])) {
            $data['profile']['photo'] = $filesContract->save($userFilesPath, $files['profile']['photo']);
        }

        if (isset($files['profile']['id_card'])) {
            $data['profile']['id_card'] = $filesContract->save($userFilesPath, $files['profile']['id_card']);
        }

        if (isset($files['profile']['proof_residence'])) {
            $data['profile']['proof_residence'] = $filesContract->save($userFilesPath, $files['profile']['proof_residence']);
        }

        $this->users->update($id, $data);

        return response()->json([], 200);

    }


    public function getResetCredentials($id, ResetCredentialsRequest $request)
    {

        $user = $this->users->showById($id);

    }

    public function resetCredentials($id, ResetCredentialsRequest $request, EncryptionInterface $encryptionContract)
    {
        $plainPassword = $request['password'];

        $request['password'] = $encryptionContract->encryptString($request['password']);
        $user = $this->users->update($id, $request->all());

        $user->notify(new CredentialsReset($plainPassword));

        return response()->json(['message' => 'Se han enviado sus nuevas credenciales a su correo electr??nico'], 200);


    }

    public function delete($id)
    {

        $this->users->delete($id);
        return response()->json(null, 204);

    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Notifications\UserCreated;
use App\Http\Controllers\Controller;
use App\Interfaces\User\UserInterface;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Interfaces\Helpers\EncryptionInterface;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    private $users, $encryption;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserInterface $userContract, EncryptionInterface $encryptionContract)
    {
        $this->middleware('guest');
        $this->users = $userContract;
        $this->encryption = $encryptionContract;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'         => ['required', 'string', 'max:255'],
            'lastname'     => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'regex:/^\+(?:[0-9]?){6,14}[0-9]$/'],
            'email'        => ['required', 'string', 'email', 'max:255', 'unique:user'],
            'password'     => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $plainPassword = $data['password'];
        $data['password'] = $this->encryption->encryptString($data['password']);

        $user = $this->users->register($data);
        $user->notify(new UserCreated($plainPassword));



        return $user;

    }
}

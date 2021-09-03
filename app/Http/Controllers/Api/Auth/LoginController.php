<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Interfaces\User\UserInterface;
use Laravel\Passport\ClientRepository;
use App\Http\Requests\User\LoginRequest;

class LoginController extends Controller
{
    protected $user;

    public function __construct(ClientRepository $client, UserInterface $user){
        $this->user = $user;
    }

    /**
     * @param LoginRequest $request
     * @return mixed
     */
    public function login(LoginRequest $request)
    {
        return $this->user->login($request);
    }
}

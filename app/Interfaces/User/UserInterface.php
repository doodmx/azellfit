<?php

namespace App\Interfaces\User;

interface UserInterface
{


    public function paginate($filter);

    public function login($credentials);

    public function sendLoginResponse();

    public function register($data, $role);

    public function changeRole($id, $role);

    public function showById($id);

    public function update($id, $data);

    public function showAllByRole($role);

    public function delete($id);
}

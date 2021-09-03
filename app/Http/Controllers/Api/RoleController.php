<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Interfaces\User\RoleInterface;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    protected $role;

    public function __construct(RoleInterface $role)
    {
        $this->role = $role;
    }

    public function store(Request $request)
    {
        try {

            DB::beginTransaction();
            $this->role->create($request->all());
            return response()->json(["message" => "Rol registrado correctamente."], 200);


        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["message" => "Ocurrio un error al registrar el rol " . $e->getMessage()], 500);
        }
    }
}

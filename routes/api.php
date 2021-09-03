<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//User Unauthenticated Routes
Route::prefix('users')->group(function () {
    Route::post('login', 'Auth\LoginController@login')->name('login');
});

Route::middleware(['auth:api'])->group( function(){

    //Roles Routes
    Route::prefix('roles')->name('role.')->group(function () {
        Route::post('/', ['uses' => 'RoleController@store'])->name('store');


        //Route::get('/', ['middleware' => ['can:view_roles'], 'uses' => 'RoleController@index'])->name('index');

        //Route::post('/', ['middleware' => ['can:create_role'], 'uses' => 'RoleController@store'])->name('store');
        //Route::get('/{role_id}', ['middleware' => ['can:show_role'], 'uses' => 'RoleController@show'])->name('show');
        //Route::patch('/{role_id}', ['middleware' => ['can:update_role'], 'uses' => 'RoleController@update'])->name('update');
        //Route::patch('/{role_id}/{status}', ['middleware' => ['can:deactivate_role'], 'uses' => 'RoleController@changeStatus'])->name('status');
    });
});

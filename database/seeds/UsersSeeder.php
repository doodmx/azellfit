<?php

use App\Models\User\User;
use App\Models\User\Profile;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        factory(User::class, 10)->create()->each(function ($user) {

            $user->profile()->save(factory(Profile::class)->make());

            if ($user->id > 1) {
                $user->assignRole('partner');
            } else {
                $user->assignRole('Super Admin');
            }


        });


    }
}

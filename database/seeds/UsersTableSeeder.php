<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$Y.jEitizf.DW3V7gxCnMr.SdWN2i1w4gobo28vTLGaFajqcjUl8Oy',
                'remember_token' => null,
                'created_at'     => '2019-09-19 12:08:28',
                'updated_at'     => '2019-09-19 12:08:28',
            ],
            [
                'id'             => 2,
                'name'           => 'Fressia',
                'email'          => 'fressia@gmail.com',
                'password'       => '$2y$10$/r9I9ANLKTgKL1n2X1LR7u.Pf4gxPqgztmh6pLEHh3QTVfJcUt20e',
                'remember_token' => null,
                'created_at'     => '2023-09-10 17:46:17',
                'updated_at'     => '2023-09-10 17:46:17',
            ],
        ];

        User::insert($users);
    }
}

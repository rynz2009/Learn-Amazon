<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'               => 'Admin',
                'email'              => 'admin@admin.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'approved'           => 1,
                'verified'           => 1,
                'verified_at'        => '2021-02-16 10:47:17',
                'verification_token' => '',
                'nama'               => '',
                'alamat'             => '',
                'no_wa'              => '',
                'no_rekening'        => '',
                'nama_bank'          => '',
            ],
        ];

        User::insert($users);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
                'is_admin' => 1,
                'logo_number' => 1,
            ],
            [
                'name' => 'User',
                'email' => 'user@user.com',
                'password' => Hash::make('password'),
                'is_admin' => 0,
                'logo_number' => 2,
            ]
        ]);
    }
}

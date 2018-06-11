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
                'name' => 'Jon Snow',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
                'is_admin' => 1,
                'logo_number' => 1,
            ],
            [
                'name' => 'Daenerys Targaryen',
                'email' => 'member@example.com',
                'password' => Hash::make('password'),
                'is_admin' => 0,
                'logo_number' => 2,
            ]
        ]);
    }
}

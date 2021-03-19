<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        User::create([
            "username" => "juvenal",
            "name"  => "Juvenal Pengele",
            "email" => "juvenal@example.com",
            "password" => Hash::make("123456789"),
            "is_admin"  => true,
        
        ]);

        User::create([
            "username" => "Karim",
            "name" => "Karim Kouayaté",
            "email" => "karim@example.com",
            "password" => Hash::make("123456789"),
            "is_admin"  => true,
        ]);

        User::create([
            "username" => "Olivier",
            "name" => "Olivier Gatoussan",
            "email" => "olivier@example.com",
            "password" => Hash::make("123456789"),
         
            "is_admin"  => true,
        ]);
    }
}

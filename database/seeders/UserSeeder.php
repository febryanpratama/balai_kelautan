<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = User::create([
            "name" => "Admin",
            "email" => "admin@admin.com",
            "password" => bcrypt("password123"),

        ]);

        $admin->assignRole("Admin");

        $user = User::create([
            "name" => "User",
            "email" => "user@user.com",
            "password" => bcrypt("password123"),
        ]);

        $user->assignRole("User");

        $verificator = User::create([
            "name" => "Verificator",
            "email" => "verificator@verificator.com",
            "password" => bcrypt("password123"),
        ]);

        $verificator->assignRole("Verificator");

        $hso = User::create([
            "name" => "Hso",
            "email" => "hso@hso.com",
            "password" => bcrypt("password123"),
        ]);

        $hso->assignRole("Hso");
    }
}

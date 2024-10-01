<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'User 1';
        $user->email = 'example@gmail.com';
        $user->email_verified_at = null;
        $user->password = Hash::make("password");
        $user->is_admin = false;
        $user->save();

        $user = new User();
        $user->name = "admin";
        $user->email = "admin@gmail.com";
        $user->password = Hash::make("1234");
        $user->is_admin = true;
        $user->save();

        $user = new User();
        $user->name = 'User 2';
        $user->email = 'example1@gmail.com';
        $user->email_verified_at = null;
        $user->password = 'password';
        $user->is_admin = false;
        $user->save();

        $user = new User();
        $user->name = 'User 3';
        $user->email = 'example22@gmail.com';
        $user->email_verified_at = null;
        $user->is_admin = false;
        $user->password = 'password';
        $user->is_admin = false;
        $user->save();
    }
}

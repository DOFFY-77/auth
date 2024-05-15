<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;



class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Mock data
        DB::table('users')->insert(
            [
                ['name' => 'Manager', 'email' => 'ledbenh.dofy@proton.me', 'email_verified_at' => '2024-04-23 09:27:33', 'password' => Hash::make('12345678'), 'remember_token' => 'TXoLy1Fayi', 'phone' => '0648446216', 'pin' => '123456', 'type' => 2, 'updated_at' => '2024-04-23 09:27:35', 'created_at' => '2024-04-23 09:27:35'],
                ['name' => 'admin', 'email' => 'hello@hello', 'email_verified_at' => '2024-04-23 09:27:33', 'password' => Hash::make('12345678'), 'remember_token' => 'TXoLy1Fayi', 'phone' => '0648446216', 'pin' => '123455', 'type' => 1, 'updated_at' => '2024-04-23 09:27:35', 'created_at' => '2024-04-23 09:27:35'],
                ['name' => 'user', 'email' => 'hello2@hello', 'email_verified_at' => '2024-04-23 09:27:33', 'password' => Hash::make('12345678'), 'remember_token' => 'TXoLy1Fayi', 'phone' => '0648446216', 'pin' => '123454', 'type' => 0, 'updated_at' => '2024-04-23 09:27:35', 'created_at' => '2024-04-23 09:27:35'],
            ]
        );}
}

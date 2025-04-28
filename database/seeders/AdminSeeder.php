<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@example.com',
        //     'password' => Hash::make('123456789'),
        // ]);
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'ผู้ดูแลระบบ',
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
                'remember_token' => null,
                'status' => 1,
            ]
        );

        User::updateOrCreate(
            ['email' => 'eservice@example.com'],
            [
                'name' => 'ผู้ดูแลระบบ Eservice',
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
                'remember_token' => null,
                'status' => 2,
            ]
        );

        User::updateOrCreate(
            ['email' => 'users@example.com'],
            [
                'name' => 'สมชาย ใจดี',
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
                'remember_token' => null,
                'status' => 3,
            ]
        );
    }
}

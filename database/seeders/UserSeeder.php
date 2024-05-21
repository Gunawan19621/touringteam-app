<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'phone' => '1234567890',
            'address' => '123 Main Street',
            'gender' => 'male',
            'password' => bcrypt('password'), // Kata sandi dienkripsi dengan bcrypt
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'phone' => '1234567801',
            'address' => '123 Main Street',
            'gender' => 'female',
            'password' => bcrypt('password'), // Kata sandi dienkripsi dengan bcrypt
        ]);
    }
}
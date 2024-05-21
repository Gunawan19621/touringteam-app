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
        // Menyisipkan data pengguna admin
        User::create([
            'username' => 'admin',
            'fullname' => 'Admin User',
            'kode' => 'ADM001',
            'email' => 'admin@admin.com',
            'nophone' => '1234567890',
            'address' => '123 Main Street',
            'gender' => 'male',
            'point' => 0,
            'password' => bcrypt('password'), // Kata sandi dienkripsi dengan bcrypt
            'avatar' => null,
            'referral_code' => null,
            'email_verified_at' => now(),
        ]);

        // Menyisipkan data pengguna biasa
        User::create([
            'username' => 'user',
            'fullname' => 'Regular User',
            'kode' => 'USR001',
            'email' => 'user@user.com',
            'nophone' => '1234567801',
            'address' => '123 Main Street',
            'gender' => 'female',
            'point' => 0,
            'password' => bcrypt('password'), // Kata sandi dienkripsi dengan bcrypt
            'avatar' => null,
            'referral_code' => null,
            'email_verified_at' => now(),
        ]);
    }
}

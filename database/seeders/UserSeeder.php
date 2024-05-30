<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     // Menyisipkan data pengguna admin
    //     User::create([
    //         'username' => 'admin',
    //         'fullname' => 'Admin User',
    //         'kode' => 'ADM001',
    //         'email' => 'admin@admin.com',
    //         'nophone' => '1234567890',
    //         'password' => bcrypt('password'), // Kata sandi dienkripsi dengan bcrypt
    //         'gender' => 'male',
    //         'address' => '123 Main Street',
    //         'point' => 0,
    //         'avatar' => null,
    //         'referral_code' => null,
    //         'email_verified_at' => now(),
    //     ]);

    //     // Menyisipkan data pengguna biasa
    //     // User::create([
    //     //     'username' => 'user',
    //     //     'fullname' => 'Regular User',
    //     //     'kode' => 'USR001',
    //     //     'email' => 'user@user.com',
    //     //     'nophone' => '1234567801',
    //     //     'address' => '123 Main Street',
    //     //     'gender' => 'female',
    //     //     'point' => 0,
    //     //     'password' => bcrypt('password'), // Kata sandi dienkripsi dengan bcrypt
    //     //     'avatar' => null,
    //     //     'referral_code' => null,
    //     //     'email_verified_at' => now(),
    //     // ]);
    // }
    public function run()
    {
        // Menyisipkan data pengguna admin
        User::create([
            'username' => 'admin',
            'fullname' => 'Admin User',
            'kode' => 'ADM001',
            'email' => 'admin@admin.com',
            'nophone' => '1234567890',
            'password' => Hash::make('password'), // Kata sandi dienkripsi dengan bcrypt
            'gender' => 'male',
            'address' => '123 Main Street',
            'point' => 0,
            'avatar' => null,
            'referral_code' => null,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
        ]);

        // Menyisipkan data pengguna biasa
        User::create([
            'username' => 'user',
            'fullname' => 'Regular User',
            'kode' => 'USR001',
            'email' => 'user@user.com',
            'nophone' => '1234567801',
            'password' => Hash::make('password'), // Kata sandi dienkripsi dengan bcrypt
            'gender' => 'female',
            'address' => '123 Main Street',
            'point' => 0,
            'avatar' => null,
            'referral_code' => null,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
        ]);
    }
}

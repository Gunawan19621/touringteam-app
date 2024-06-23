<?php

namespace Database\Seeders;

use App\Models\M_Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class M_RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        M_Role::create([
            'rolename' => 'admin',
            'description' => 'Administrator',
        ]);

        // Menyisipkan beberapa data pengguna biasa menggunakan loop
        for ($i = 1; $i <= 4; $i++) {
            M_Role::create([
                'rolename' => 'user' . $i,
                'description' => 'Regular User' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
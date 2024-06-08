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
        M_Role::create([
            'rolename' => 'user',
            'description' => 'Regular User',
        ]);
    }
}

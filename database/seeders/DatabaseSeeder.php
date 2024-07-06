<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\M_RoleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            M_RoleSeeder::class,
            T_WaypointsSeeder::class,
            M_TransportationsSeeder::class,
            T_GroupSeeder::class,
            GroupMemberSeeder::class,
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\T_Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class T_GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            T_Group::create([
                'name' => 'group' . $i,
                'description' => 'Description Group ' . $i,
                'send_notif' => $i % 2 == 0 ? 'pic' : 'all',
                'distance' => rand(100, 1000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

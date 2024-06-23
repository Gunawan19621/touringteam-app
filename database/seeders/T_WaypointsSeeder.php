<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class T_WaypointsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menyisipkan data waypoints menggunakan loop
        for ($i = 1; $i <= 5; $i++) {
            DB::table('t_waypoints')->insert([
                'user_id' => $i,
                'group_id' => $i,
                'latitude' => '37.7749' . $i, // Contoh latitude
                'longitude' => '-122.4194' . $i, // Contoh longitude
                'altitude' => '30' . $i, // Contoh altitude
                'speed' => '60' . $i, // Contoh speed
                'angle' => '90' . $i, // Contoh angle
                'created_at_wptime' => now(),
                'updated_at_wptime' => now(),
                'created_at_date_send' => now(),
                'updated_at_date_send' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
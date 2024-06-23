<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class M_TransportationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('m_transportations')->insert([
                'type' => 'motor',
                'name' => 'Vario ' . $i,
                'machine' => 'Honda',
                'thn_beli' => 2015,
                'thn_rakit' => 2015,
                'plat_no' => 'B ' . $i . ' 1234 ' . $i,
                'foto_kendaraan' => 'foto_' . $i . '.jpg',
                'description' => 'Kendaraan ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
<?php

namespace Database\Seeders;

use App\Models\GroupMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            GroupMember::create([
                'group_id' => $i,
                'user_id' => $i,
                'status_approve' => 'approve',
                'status' => 'active',
                'status_sos' => 'active',
                'status_lead' => 'true',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

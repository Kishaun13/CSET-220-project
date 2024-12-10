<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RosterSeeder extends Seeder
{
    public function run()
    {
        DB::table('roster')->insert([
            [
                'roster_id' => 3,
                'date' => '2024-12-09',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'roster_id' => 20,
                'date' => '2024-12-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
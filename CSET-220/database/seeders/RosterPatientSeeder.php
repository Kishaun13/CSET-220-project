<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RosterPatientSeeder extends Seeder
{
    public function run()
    {
        DB::table('roster_patient')->insert([
            [
                'roster_id' => 3,
                'patient_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'roster_id' => 20,
                'patient_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
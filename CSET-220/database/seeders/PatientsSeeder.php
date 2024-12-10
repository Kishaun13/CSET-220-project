<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientsSeeder extends Seeder
{
    public function run()
    {
        DB::table('patients')->insert([
            [
                'patient_id' => 1,
                'name' => 'Johny',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'patient_id' => 2,
                'name' => 'Jack Jack',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
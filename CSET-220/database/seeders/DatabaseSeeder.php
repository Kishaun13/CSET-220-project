<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Insert roles
        DB::table('roles')->insert([
            ['role_name' => 'Admin', 'access_level' => 1],
            ['role_name' => 'Manager', 'access_level' => 2],
            ['role_name' => 'Employee', 'access_level' => 3],
        ]);

        // Create the admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // Remember to bcrypt the password
            'role_id' => 1, // Admin role id, assuming it's the first role created
        ]);
    }
}

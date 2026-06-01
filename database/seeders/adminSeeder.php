<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_admin')->insert([
            'name' => 'Master Admin',
            'email' => 'masteradmin@yopmail.com',
            'password' => Hash::make('123'), // Securely hashes your password
            'role' => 'admin',               // Matches your enum value
            'login_token' => null,
            'last_login' => null,
            'is_delete' => false,
            'deleted_by' => null,
            'created_date' => now(),           // Sets creation time to right now
            'updated_date' => null,            // Left null based on your previous rule
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Uncomment the following line to seed the admin user
        DB::table('users')->insert([
            'name' => 'hayatul habirun',
            'no_hp' => '08123123123',
            'password' => bcrypt('admin123'),
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('admin')->insert([
            'username' => 'Sushma Thapa',
            'password' => Hash::make('ILOVEYOU28'), // bcrypt hash
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

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
            'username' => 'feel',
            'email' => 'feeldance@example.com',
            'first_name' => 'Feel',
            'last_name' => 'Dance',
            'password' => Hash::make('feel'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

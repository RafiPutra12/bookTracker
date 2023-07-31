<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@admin',
                'password' => Hash::make('admin'),
                'role' => 'admin',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'dewa',
                'email' => 'dewa@gmail.com',
                'password' => Hash::make('dewa'),
                'role' => 'user',
                'remember_token' => Str::random(10),
            ]
        ]);
    }
}

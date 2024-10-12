<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Creating data for users
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@live.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'admin',
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'mazin',
            'email' => 'mazin@live.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'tech_staff',
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'izan',
            'email' => 'izan@live.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'user',
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory(10)->create();
    }
}

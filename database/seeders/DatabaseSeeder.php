<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(IndoBankSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::create([
        //     'username' => 'admin',
        //     'role' => 'admin',
        //     'password' => Hash::make('123')
        // ]);
        // \App\Models\User::create([
        //     'username' => 'super admin',
        //     'role' => 'super admin',
        //     'password' => Hash::make('123')
        // ]);
    }
}

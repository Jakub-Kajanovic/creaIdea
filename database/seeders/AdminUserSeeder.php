<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Jakub Kajanovič',
            'email' => 'kajanovic@irubiq.com',
            'password' => Hash::make('Nexus123!Jakub'),
            'is_admin' => 1,
        ]);
    }
}

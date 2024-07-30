<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    // Create the admin user and assign the 'admin' role
    $adminUser = User::firstOrCreate(
        [
            'email' => 'admin@example.com',
        ],
        [
            'name' => 'Admin User',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]
    );
    $adminUser->assignRole('Admin');

    // Create the employee user and assign the 'user' role
    $employeeUser = User::firstOrCreate(
        [
            'email' => 'employee@example.com',
        ],
        [
            'name' => 'Employee User',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]
    );
    $employeeUser->assignRole('Employee');
}
    
}

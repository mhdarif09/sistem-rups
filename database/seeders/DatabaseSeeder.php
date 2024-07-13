<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Import the User model
use Illuminate\Support\Facades\Hash; // Import the Hash facade

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'), // Hashing the password
            'alamat' => 'Super Admin Address',
            'nohp' => '1234567890',
            'jenis_kelamin' => 'Male',
            'jabatan' => 'superadmin',
            'divisi' => 'superadmin',
            'role' => 'super_admin',  // Role khusus untuk super admin
            'is_approved' => true,
        ]);
    }
}

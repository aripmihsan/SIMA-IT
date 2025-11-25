<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'), // Password admin
            'role' => 'admin', // Pastikan kolom ini ada (dari Hari 2)
        ]);
        
        // Kita buat juga 1 user karyawan buat tes
        User::create([
            'name' => 'Karyawan IT',
            'email' => 'staff@cyber.id',
            'password' => Hash::make('password123'),
            'role' => 'staff',
        ]);
    }
}
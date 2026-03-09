<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'nama' => 'Admin Toko',
            'email' => 'admin@tokoku.id',
            'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
            'no_hp' => '08123456789',
            'role' => 'admin',
        ]);

        \App\Models\User::create([
            'nama' => 'Andi Setiawan',
            'email' => 'andi@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('pelanggan123'),
            'no_hp' => '081222333444',
            'role' => 'pelanggan',
        ]);
    }
}

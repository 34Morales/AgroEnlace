<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
 
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@agro.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin'
        ]);

        // Productor
        User::create([
            'name' => 'Productor 1',
            'email' => 'productor@agro.com',
            'password' => Hash::make('12345678'),
            'role' => 'seller'
        ]);

        // Cliente
        User::create([
            'name' => 'Cliente 1',
            'email' => 'cliente@agro.com',
            'password' => Hash::make('12345678'),
            'role' => 'buyer'
        ]);
    }
}

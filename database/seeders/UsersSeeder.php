<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // Crear o actualizar un usuario Administrador
        $admin = User::updateOrCreate(
            [
                'email' => 'admin@example.com',
            ],
            [
                'name' => 'Admin',
                'password' => Hash::make('Admin123'),
                'email_verified_at' => now(),
            ]
        );
        $admin->assignRole('Administrador');

        // Crear o actualizar un usuario para Ventas
        $ventas = User::updateOrCreate(
            [
                'email' => 'ventas@example.com',
            ],
            [
                'name' => 'Ventas User',
                'password' => Hash::make('Ventas123'),
                'email_verified_at' => now(),
            ]
        );
        $ventas->assignRole('Ventas');

        // Crear o actualizar un usuario para Taller
        $taller = User::updateOrCreate(
            [
                'email' => 'taller@example.com',
            ],
            [
                'name' => 'Taller User',
                'password' => Hash::make('Taller123'),
                'email_verified_at' => now(),
            ]
        );
        $taller->assignRole('Taller');
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // Crear un usuario Administrador
        $admin = User::firstOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin',
            'password' => Hash::make('Admin123'),
        ]);
        $admin->assignRole('Administrador');

        // Crear un usuario para Ventas
        $ventas = User::firstOrCreate([
            'email' => 'ventas@example.com',
        ], [
            'name' => 'Ventas User',
            'password' => Hash::make('Ventas123'),
        ]);
        $ventas->assignRole('Ventas');

        // Crear un usuario para Taller
        $taller = User::firstOrCreate([
            'email' => 'taller@example.com',
        ], [
            'name' => 'Taller User',
            'password' => Hash::make('Taller123'),
        ]);
        $taller->assignRole('Taller');
    }
}

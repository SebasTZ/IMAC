<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'nombre' => 'Cliente Ejemplo 1',
            'email' => 'cliente1@example.com',
            'telefono' => '1234567890', // Adding telefono field
        ]);

        Cliente::create([
            'nombre' => 'Cliente Ejemplo 2',
            'email' => 'cliente2@example.com',
            'telefono' => '0987654321', // Adding telefono field
        ]);
    }
}

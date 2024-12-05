<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pedido;

class PedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pedido::create([
            'cliente_id' => 1, // Assuming a cliente with ID 1 exists
            'descripcion' => 'Pedido de ejemplo 1',
            'estado' => 'pendiente',
            'material_purpose' => 'Construcción',
            'material_requested' => true,
        ]);

        Pedido::create([
            'cliente_id' => 2, // Assuming a cliente with ID 2 exists
            'descripcion' => 'Pedido de ejemplo 2',
            'estado' => 'completado',
            'material_purpose' => 'Reparación',
            'material_requested' => false,
        ]);
    }
}
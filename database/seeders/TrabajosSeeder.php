<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trabajo;

class TrabajosSeeder extends Seeder
{
    public function run()
    {
        Trabajo::create([
            'cliente_id' => 1, // Assuming a cliente with ID 1 exists
            'descripcion' => 'Trabajo de ejemplo 1',
            'estado' => 'pendiente',
            'costo' => 100.00,
            'material_purpose' => 'Construcción',
            'material_received' => true,
            'tipo_comprobante' => 'Boleta',
        ]);

        Trabajo::create([
            'cliente_id' => 2, // Assuming a cliente with ID 2 exists
            'descripcion' => 'Trabajo de ejemplo 2',
            'estado' => 'completado',
            'costo' => 200.00,
            'material_purpose' => 'Reparación',
            'material_received' => false,
            'tipo_comprobante' => 'Factura',
        ]);
    }
}
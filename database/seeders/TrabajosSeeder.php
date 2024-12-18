<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trabajo;
use App\Models\User;

class TrabajosSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        if ($users->count() >= 2) {
            Trabajo::create([
                'cliente_id' => 1,
                'descripcion' => 'Trabajo de ejemplo 1',
                'estado' => 'pendiente',
                'costo' => 100.00,
                'material_purpose' => 'Construcción',
                'material_received' => true,
                'tipo_comprobante' => 'Boleta',
                'trabajo_usuario_id' => $users[0]->id,
                'fecha_ingreso' => now(), // Add this line
                'fecha_culminacion' => now()->addDays(10), // Add this line
                'observaciones' => true, // Add this line
                'observacion_texto' => 'Observación de ejemplo 1', // Add this line
                'conformidad_cliente' => true, // Add this line
                'conformidad_texto' => null, // Add this line
]);

            Trabajo::create([
                'cliente_id' => 2,
                'descripcion' => 'Trabajo de ejemplo 2',
                'estado' => 'completado',
                'costo' => 200.00,
                'material_purpose' => 'Reparación',
                'material_received' => false,
                'tipo_comprobante' => 'Factura',
                'trabajo_usuario_id' => $users[1]->id,
                'fecha_ingreso' => now(), // Add this line
                'fecha_culminacion' => now()->addDays(5), // Add this line
                'observaciones' => false, // Add this line
                'observacion_texto' => null, // Add this line
                'conformidad_cliente' => false, // Add this line
                'conformidad_texto' => 'Cliente no conforme con el trabajo', // Add this line
]);
        } else {
            $this->command->warn("No hay suficientes usuarios para crear trabajos. Ejecuta UsersSeeder primero.");
        }
    }
}
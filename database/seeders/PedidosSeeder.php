<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pedido;
use App\Models\Material;

class PedidosSeeder extends Seeder
{
    public function run()
    {
        $materials = Material::all();

        if ($materials->count() >= 3) {
            $orders = [
                ['material_id' => $materials[0]->id, 'estado' => 'pendiente', 'material_purpose' => 'Reparación', 'material_requested' => true],
                ['material_id' => $materials[1]->id, 'estado' => 'en proceso', 'material_purpose' => 'Mantenimiento', 'material_requested' => false],
                ['material_id' => $materials[2]->id, 'estado' => 'completado', 'material_purpose' => 'Reemplazo', 'material_requested' => true],
            ];

            foreach ($orders as $order) {
                Pedido::create($order);
            }
        } else {
            $this->command->warn("No hay suficientes materiales para crear pedidos. Ejecuta MaterialsSeeder primero.");
        }
    }
}
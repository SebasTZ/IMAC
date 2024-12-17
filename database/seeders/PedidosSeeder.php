<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pedido;
use App\Models\Material;
use App\Models\User;

class PedidosSeeder extends Seeder
{
    public function run()
    {
        $materials = Material::all();
        $users = User::all();

        if ($materials->count() >= 3 && $users->count() >= 3) {
            $orders = [
                ['material_id' => $materials[0]->id, 'estado' => 'pendiente', 'material_purpose' => 'Reparación', 'material_requested' => true, 'entrega_usuario_id' => $users[0]->id, 'recepcion_usuario_id' => $users[0]->id],
                ['material_id' => $materials[1]->id, 'estado' => 'en proceso', 'material_purpose' => 'Mantenimiento', 'material_requested' => false, 'entrega_usuario_id' => $users[1]->id, 'recepcion_usuario_id' => $users[1]->id],
                ['material_id' => $materials[2]->id, 'estado' => 'completado', 'material_purpose' => 'Reemplazo', 'material_requested' => true, 'entrega_usuario_id' => $users[2]->id, 'recepcion_usuario_id' => $users[2]->id],
            ];

            foreach ($orders as $order) {
                Pedido::create($order);
            }
        } else {
            $this->command->warn("No hay suficientes materiales o usuarios para crear pedidos. Ejecuta MaterialsSeeder y UsersSeeder primero.");
        }
    }
}
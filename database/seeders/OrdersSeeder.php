<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pedido;
use App\Models\Cliente;

class OrdersSeeder extends Seeder
{
    public function run()
    {
        $clients = Cliente::all();

        if ($clients->count() >= 3) {
            $orders = [
                ['cliente_id' => $clients[0]->id, 'descripcion' => 'Reparación de motor', 'estado' => 'pendiente', 'material_purpose' => 'Reparación', 'material_requested' => true],
                ['cliente_id' => $clients[1]->id, 'descripcion' => 'Mantenimiento preventivo', 'estado' => 'en proceso', 'material_purpose' => 'Mantenimiento', 'material_requested' => false],
                ['cliente_id' => $clients[2]->id, 'descripcion' => 'Cambio de piezas', 'estado' => 'completado', 'material_purpose' => 'Reemplazo', 'material_requested' => true],
            ];

            foreach ($orders as $order) {
                Pedido::create($order);
            }
        } else {
            $this->command->warn("No hay suficientes clientes para crear pedidos. Ejecuta ClientsSeeder primero.");
        }
    }
}
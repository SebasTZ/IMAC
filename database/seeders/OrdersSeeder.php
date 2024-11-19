<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trabajo;
use App\Models\Cliente;

class OrdersSeeder extends Seeder
{
    public function run()
    {
        $clients = Cliente::all();

        if ($clients->count() >= 3) {
            $orders = [
                ['client_id' => $clients[0]->id, 'descripcion' => 'Reparación de motor', 'status' => 'pendiente', 'total' => 150],
                ['client_id' => $clients[1]->id, 'descripcion' => 'Mantenimiento preventivo', 'status' => 'en proceso', 'total' => 100],
                ['client_id' => $clients[2]->id, 'descripcion' => 'Cambio de piezas', 'status' => 'completado', 'total' => 200],
            ];

            foreach ($orders as $order) {
                \App\Models\Trabajo::create($order);
            }
        } else {
            $this->command->warn("No hay suficientes clientes para crear pedidos. Ejecuta ClientsSeeder primero.");
        }
    }
}

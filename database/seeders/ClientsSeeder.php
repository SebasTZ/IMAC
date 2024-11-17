<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente; // Asegúrate de usar el modelo correcto
use Illuminate\Support\Facades\Schema;

class ClientsSeeder extends Seeder
{
    public function run()
    {
        if (!Schema::hasTable('clientes')) {
            $this->command->warn("La tabla 'clients' no existe. Asegúrate de ejecutar las migraciones.");
            return;
        }

        $clients = [
            ['name' => 'Cliente 1', 'contact' => '987654321', 'email' => 'cliente1@example.com'],
            ['name' => 'Cliente 2', 'contact' => '987654322', 'email' => 'cliente2@example.com'],
            ['name' => 'Cliente 3', 'contact' => '987654323', 'email' => 'cliente3@example.com'],
        ];

        foreach ($clients as $client) {
            Cliente::firstOrCreate(['email' => $client['email']], $client);
        }
    }
}

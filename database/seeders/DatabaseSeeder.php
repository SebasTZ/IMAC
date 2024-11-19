<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            UsersSeeder::class,
            MaterialsSeeder::class,
            ClientsSeeder::class,
            PedidosSeeder::class, // Ensure PedidosSeeder is called before TrabajosSeeder
            TrabajosSeeder::class, // Add TrabajosSeeder here
        ]);
    }
}

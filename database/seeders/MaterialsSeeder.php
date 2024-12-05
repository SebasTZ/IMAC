<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;

class MaterialsSeeder extends Seeder
{
    public function run()
    {
        $materials = [
            ['nombre' => 'Tornillo', 'stock' => 100, 'precio' => 0.5],
            ['nombre' => 'Tuerca', 'stock' => 200, 'precio' => 0.3],
            ['nombre' => 'Arandela', 'stock' => 150, 'precio' => 0.1],
            ['nombre' => 'Aceite para máquinas', 'stock' => 50, 'precio' => 10],
        ];

        foreach ($materials as $material) {
            Material::firstOrCreate(['nombre' => $material['nombre']], $material);
        }
    }
}
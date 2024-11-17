<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;

class MaterialsSeeder extends Seeder
{
    public function run()
    {
        $materials = [
            ['name' => 'Tornillo', 'stock' => 100, 'price' => 0.5],
            ['name' => 'Tuerca', 'stock' => 200, 'price' => 0.3],
            ['name' => 'Arandela', 'stock' => 150, 'price' => 0.1],
            ['name' => 'Aceite para máquinas', 'stock' => 50, 'price' => 10],
        ];

        foreach ($materials as $material) {
            Material::firstOrCreate(['name' => $material['name']], $material);
        }
    }
}

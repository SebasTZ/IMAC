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
            ['nombre' => 'DISCO DE CORTE METAL PRETUL 22348 4 1/2"X3/64"X7/8" CORTE EXTRA FINO', 'stock' => 50, 'precio' => 3.5],
            ['nombre' => 'BROCA P/CONCRETO BOSCH 2608685951 SDS PLUS-1 9.5MM-3/8" X4X6" CARBURO DE TUNGSTENO P/HORMIGON', 'stock' => 50, 'precio' => 12],
            ['nombre' => 'DISCO DE CORTE MADERA UYUSTOOLS DMD724 7 1/2"-1/4" 24D', 'stock' => 50, 'precio' => 23],
            ['nombre' => 'BROCA P/MADERA ALPEN HOLZ A5412 10MM L133/87MM', 'stock' => 50, 'precio' => 10],
            ['nombre' => 'BROCA P/MADERA BOSCH 2608596310 13MM X 151MM CV', 'stock' => 50, 'precio' => 27],
            ['nombre' => 'CUCHILLA TERMOMAGNETICA STRONGER ALF6K/3 C63 63AMP ALPHA TRIFASICO', 'stock' => 50, 'precio' => 36],
            ['nombre' => 'PLANCA COMPACTADORA NACIONAL + POTENCIA 13.HP BN3890 BONELLY', 'stock' => 50, 'precio' => 2740],
            ['nombre' => 'JUEGO, SET,KIT O MIXED DE LLAVE ALEN KAMASA KM-065 P/BOLA JGO 9 PCS (M)', 'stock' => 50, 'precio' => 18.5],
            ['nombre' => 'ASPIRADORA INDUSTRIAL TOTAL TVC14301 1400W 30LTS INOX 220-60HZ', 'stock' => 50, 'precio' => 580],
            ['nombre' => 'CABLE DE ACERO 3/8" 6X19FC GALVANIZADO', 'stock' => 50, 'precio' => 6.5],
            ['nombre' => 'ELECTRODO DE SOLDADURA ALCORD O NAZCA ALU 5 SI ALUMINIO 1/8"', 'stock' => 50, 'precio' => 3.5],
            ['nombre' => 'ELECTROBOMBA CENTRIFUGA PENTAX CM100/00 1"X1" 1.0HP MONOFASICA 220V-60HZ', 'stock' => 50, 'precio' => 670],
            ['nombre' => 'COPLE MACHO TRUPER 19085 1/4" LATÓN COPLE-MA-1/4', 'stock' => 50, 'precio' => 15],
            ['nombre' => 'CONECTOR ESCAMADO MACHO BCE. 1/4" X 1/4" NPT (N)', 'stock' => 50, 'precio' => 7],
            ['nombre' => 'NIPLE TIPO T GALVANIZADO HEMBRA 1/4"', 'stock' => 50, 'precio' => 3],
            ['nombre' => 'MANGUERA PARA AIRE OILLEX 20BAR 1/4" ROJO/NEGRO', 'stock' => 50, 'precio' => 5.5],
            ['nombre' => 'BUJIA ENCENDIDO NGK 7327 BP5EY 1/E 7/8" 14MM R/L - NGK', 'stock' => 50, 'precio' => 9],
            ['nombre' => 'FILTRO DE AIRE PARA MOTOR HONDA GX390 GENERICO', 'stock' => 50, 'precio' => 38],
            ['nombre' => 'ELECTRODO DE SOLDADURA FONTARGEN EXA 106 1/8"', 'stock' => 50, 'precio' => 6],
        ];

        foreach ($materials as $material) {
            Material::firstOrCreate(['nombre' => $material['nombre']], $material);
        }
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use Illuminate\Support\Facades\Schema;

class ClientsSeeder extends Seeder
{
    public function run()
    {
        if (!Schema::hasTable('clientes')) {
            $this->command->warn("La tabla 'clientes' no existe. Asegúrate de ejecutar las migraciones.");
            return;
        }

        $clients = [
            ['nombre' => 'CLIENTES VARIOS', 'telefono' => '000000000', 'email' => 'Clientes@gmail.com'],
            ['nombre' => 'MIAT CONTRATISTAS GENERALES E.I.R.L.', 'telefono' => '984807015', 'email' => 'Miat@gmail.com'],
            ['nombre' => 'ESPIRITU AQUINO, GILBERTO', 'telefono' => '903783792', 'email' => 'Espiritu@gmail.com'],
            ['nombre' => 'PEREZ PAUCAR JEAN JHAIR', 'telefono' => '972221068', 'email' => 'Perez@gmail.com'],
            ['nombre' => 'CUADRA ESPINOZA, KRYSTHOPER ATREYUS XAVIER', 'telefono' => '951480352', 'email' => 'Cuadra@gmail.com'],
            ['nombre' => 'MARTINEZ SANCHEZ, GODOFREDO SIMEON', 'telefono' => '987105406', 'email' => 'Martinez@gmail.com'],
            ['nombre' => 'PONCE ESPINOZA, BERNARDINO', 'telefono' => '947391596', 'email' => 'Ponce@gmail.com'],
            ['nombre' => 'ESPINOZA CABRERA, ALCIDES DANIEL', 'telefono' => '965806851', 'email' => 'Espinoza@gmail.com'],
            ['nombre' => 'CONSORCIO EJECUTOR HUANACAURE', 'telefono' => '959313824', 'email' => 'Consorcio@gmail.com'],
            ['nombre' => 'COTRINA CABELLO DENIS FLORA', 'telefono' => '908335630', 'email' => 'Cotrina@gmail.com'],
            ['nombre' => 'CONSORCIO HUALLANCA', 'telefono' => '945894644', 'email' => 'Consorcio@gmail.com'],
            ['nombre' => 'CONSORCIO SANTA ROSA', 'telefono' => '976629755', 'email' => 'Consorcio@gmail.com'],
            ['nombre' => 'PALACIOS DAZA, SINDY XUXA', 'telefono' => '962933315', 'email' => 'Palacios@gmail.com'],
            ['nombre' => 'ADVINCULA TUCTO, EDWIN CALIXTO', 'telefono' => '984550093', 'email' => 'Advincula@gmail.com'],
            ['nombre' => 'FABIAN VARA, EDWIN', 'telefono' => '952636884', 'email' => 'Fabian@gmail.com'],
            ['nombre' => 'RIVERA JARA ALEX GABRIEL', 'telefono' => '966215247', 'email' => 'Rivera@gmail.com'],
            ['nombre' => 'TAMPERSA SOCIEDAD ANONIMA CERRADA', 'telefono' => '950820757', 'email' => 'Tampersa@gmail.com'],
            ['nombre' => 'FERNANDEZ LOPEZ GIANCARLO', 'telefono' => '927427346', 'email' => 'Fernandez@gmail.com'],
            ['nombre' => 'CONSORCIO CANALIZACIÓN', 'telefono' => '999252622', 'email' => 'Consorcio@gmail.com'],
            ['nombre' => 'REYES COTRINA SANTA CRUZ', 'telefono' => '958448457', 'email' => 'Reyes@gmail.com'],
        ];

        foreach ($clients as $client) {
            Cliente::firstOrCreate(['email' => $client['email']], $client);
        }
    }
}
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
            ['nombre' => 'CLIENTES VARIOS', 'telefono' => '000000000', 'email' => 'Clientes@gmail.com', 'tipo_documento' => 'DNI', 'numero_documento' => '00000000'],
            ['nombre' => 'MIAT CONTRATISTAS GENERALES E.I.R.L.', 'telefono' => '984807015', 'email' => 'Miat@gmail.com', 'tipo_documento' => 'RUC', 'numero_documento' => '12345678901'],
            ['nombre' => 'ESPIRITU AQUINO, GILBERTO', 'telefono' => '903783792', 'email' => 'Espiritu@gmail.com', 'tipo_documento' => 'DNI', 'numero_documento' => '12345678'],
            ['nombre' => 'PEREZ PAUCAR JEAN JHAIR', 'telefono' => '972221068', 'email' => 'Perez@gmail.com', 'tipo_documento' => 'DNI', 'numero_documento' => '23456789'],
            ['nombre' => 'CUADRA ESPINOZA, KRYSTHOPER ATREYUS XAVIER', 'telefono' => '951480352', 'email' => 'Cuadra@gmail.com', 'tipo_documento' => 'DNI', 'numero_documento' => '34567890'],
            ['nombre' => 'MARTINEZ SANCHEZ, GODOFREDO SIMEON', 'telefono' => '987105406', 'email' => 'Martinez@gmail.com', 'tipo_documento' => 'DNI', 'numero_documento' => '45678901'],
            ['nombre' => 'PONCE ESPINOZA, BERNARDINO', 'telefono' => '947391596', 'email' => 'Ponce@gmail.com', 'tipo_documento' => 'DNI', 'numero_documento' => '56789012'],
            ['nombre' => 'ESPINOZA CABRERA, ALCIDES DANIEL', 'telefono' => '965806851', 'email' => 'Espinoza@gmail.com', 'tipo_documento' => 'DNI', 'numero_documento' => '67890123'],
            ['nombre' => 'CONSORCIO EJECUTOR HUANACAURE', 'telefono' => '959313824', 'email' => 'Consorcio@gmail.com', 'tipo_documento' => 'RUC', 'numero_documento' => '23456789012'],
            ['nombre' => 'COTRINA CABELLO DENIS FLORA', 'telefono' => '908335630', 'email' => 'Cotrina@gmail.com', 'tipo_documento' => 'DNI', 'numero_documento' => '78901234'],
            ['nombre' => 'CONSORCIO HUALLANCA', 'telefono' => '945894644', 'email' => 'Consorcio@gmail.com', 'tipo_documento' => 'RUC', 'numero_documento' => '34567890123'],
            ['nombre' => 'CONSORCIO SANTA ROSA', 'telefono' => '976629755', 'email' => 'Consorcio@gmail.com', 'tipo_documento' => 'RUC', 'numero_documento' => '45678901234'],
            ['nombre' => 'PALACIOS DAZA, SINDY XUXA', 'telefono' => '962933315', 'email' => 'Palacios@gmail.com', 'tipo_documento' => 'DNI', 'numero_documento' => '89012345'],
            ['nombre' => 'ADVINCULA TUCTO, EDWIN CALIXTO', 'telefono' => '984550093', 'email' => 'Advincula@gmail.com', 'tipo_documento' => 'DNI', 'numero_documento' => '90123456'],
            ['nombre' => 'FABIAN VARA, EDWIN', 'telefono' => '952636884', 'email' => 'Fabian@gmail.com', 'tipo_documento' => 'DNI', 'numero_documento' => '01234567'],
            ['nombre' => 'RIVERA JARA ALEX GABRIEL', 'telefono' => '966215247', 'email' => 'Rivera@gmail.com', 'tipo_documento' => 'DNI', 'numero_documento' => '12345670'],
            ['nombre' => 'TAMPERSA SOCIEDAD ANONIMA CERRADA', 'telefono' => '950820757', 'email' => 'Tampersa@gmail.com', 'tipo_documento' => 'RUC', 'numero_documento' => '56789012345'],
            ['nombre' => 'FERNANDEZ LOPEZ GIANCARLO', 'telefono' => '927427346', 'email' => 'Fernandez@gmail.com', 'tipo_documento' => 'DNI', 'numero_documento' => '23456701'],
            ['nombre' => 'CONSORCIO CANALIZACIÓN', 'telefono' => '999252622', 'email' => 'Consorcio@gmail.com', 'tipo_documento' => 'RUC', 'numero_documento' => '67890123456'],
            ['nombre' => 'REYES COTRINA SANTA CRUZ', 'telefono' => '958448457', 'email' => 'Reyes@gmail.com', 'tipo_documento' => 'DNI', 'numero_documento' => '34567012'],
        ];

        foreach ($clients as $client) {
            Cliente::firstOrCreate(['email' => $client['email']], $client);
        }
    }
}
<?php

namespace App\Exports;

use App\Models\Pedido;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PedidosExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Pedido::all();
    }

    public function headings(): array
    {
        return [
            'ID', 'Cliente ID', 'Descripción', 'Estado', 'Propósito del Material', 'Material Solicitado', 'Created At', 'Updated At'
        ];
    }
}
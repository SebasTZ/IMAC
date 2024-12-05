<?php

namespace App\Exports;

use App\Models\Trabajo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TrabajosExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Trabajo::all();
    }

    public function headings(): array
    {
        return [
            'ID', 'Pedido ID', 'Cliente ID', 'Descripción', 'Estado', 'Costo', 'Material Purpose', 'Material Received', 'Tipo Comprobante', 'Created At', 'Updated At'
        ];
    }
}
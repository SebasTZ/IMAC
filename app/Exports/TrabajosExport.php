<?php

namespace App\Exports;

use App\Models\Trabajo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TrabajosExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Trabajo::with('cliente')->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Cliente',
            'Descripción',
            'Estado',
            'Costo',
            'Propósito del Material',
            'Material Recibido',
            'Tipo de Comprobante',
            'Usuario que realiza el trabajo',
            'Fecha de Creación',
            'Fecha de Actualización',
        ];
    }

    /**
     * @var Trabajo $trabajo
     */
    public function map($trabajo): array
    {
        return [
            $trabajo->id,
            $trabajo->cliente ? $trabajo->cliente->nombre : 'N/A',
            $trabajo->descripcion,
            ucfirst($trabajo->estado),
            number_format($trabajo->costo, 2),
            $trabajo->material_purpose,
            $trabajo->material_received ? 'Sí' : 'No',
            $trabajo->tipo_comprobante,
            $trabajo->trabajoUsuario->name,
            $trabajo->created_at->format('Y-m-d H:i:s'),
            $trabajo->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
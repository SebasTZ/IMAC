<?php

namespace App\Exports;

use App\Models\Pedido;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PedidosExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Pedido::with('material')->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Material',
            'Estado',
            'Propósito del Material',
            'Material Solicitado',
            'Usuario que entrega el material',
            'Usuario que recibe el material',
            'Fecha del Pedido',
            'Fecha de la Entrega',
            'Observaciones de la Entrega',
            'Observaciones',
            'Fecha de Creación',
            'Fecha de Actualización',
        ];
    }

    /**
     * @var Pedido $pedido
     */
    public function map($pedido): array
    {
        return [
            $pedido->id,
            $pedido->material ? $pedido->material->nombre : 'N/A',
            $pedido->estado,
            $pedido->material_purpose,
            $pedido->material_requested ? 'Sí' : 'No',
            $pedido->entregaUsuario->name,
            $pedido->recepcionUsuario->name,
            $pedido->fecha_pedido,
            $pedido->fecha_entrega,
            $pedido->observaciones_entrega ? 'Sí' : 'No',
            $pedido->observaciones_texto,
            $pedido->created_at->format('Y-m-d H:i:s'),
            $pedido->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}

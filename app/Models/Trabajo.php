<?php
// Trabajo.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    use HasFactory;

    protected $fillable = [
        'pedido_id',
        'cliente_id',
        'descripcion',
        'estado',
        'costo',
        'material_purpose',
        'material_received',
        'tipo_comprobante', // Nuevo campo
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
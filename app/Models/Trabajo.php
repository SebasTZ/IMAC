<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'descripcion',
        'estado',
        'costo',
        'material_purpose',
        'material_received',
        'tipo_comprobante',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
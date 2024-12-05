<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'descripcion',
        'estado',
        'material_purpose', // Nuevo campo
        'material_requested', // Nuevo campo
    ];

    public function trabajos()
    {
        return $this->hasMany(Trabajo::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}

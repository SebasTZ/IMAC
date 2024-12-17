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
        'trabajo_usuario_id', // Add this line
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function trabajoUsuario()
    {
        return $this->belongsTo(User::class, 'trabajo_usuario_id');
    }
}
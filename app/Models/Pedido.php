<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'material_id',
        'estado',
        'material_purpose',
        'material_requested',
        'entrega_usuario_id', // Add this line
        'recepcion_usuario_id', // Add this line
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
    public function entregaUsuario()
    {
        return $this->belongsTo(User::class, 'entrega_usuario_id');
    }
    public function recepcionUsuario()
    {
        return $this->belongsTo(User::class, 'recepcion_usuario_id');
    }
}
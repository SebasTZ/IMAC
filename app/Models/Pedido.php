<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cliente_id',
        'descripcion',
        'estado',
        'tipo',
    ];

    /**
     * Get the trabajos for the pedido.
     */
    public function trabajos()
    {
        return $this->hasMany(Trabajo::class);
    }

    /**
     * Get the cliente that owns the pedido.
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}

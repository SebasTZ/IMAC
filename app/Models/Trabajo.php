<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pedido_id',
        'descripcion',
        'estado',
        'costo',
        'material_purpose',
        'material_received',
    ];

    /**
     * Get the pedido associated with the trabajo.
     */
    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }
}

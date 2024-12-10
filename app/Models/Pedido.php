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
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
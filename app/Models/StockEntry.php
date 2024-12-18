<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockEntry extends Model
{
    use HasFactory;

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = [
        'material_id',
        'cantidad',
    ];

    // Definir la relación con el modelo Material
    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
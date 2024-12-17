<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'codigo_material',
        'categoria',
        'stock',
        'precio',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($material) {
            $material->codigo_material = 'MAT-' . str_pad(Material::max('id') + 1, 4, '0', STR_PAD_LEFT);
        });
    }

    public function batches()
    {
        return $this->hasMany(MaterialBatch::class);
    }

    public function addStock($cantidad)
    {
        $this->batches()->create(['cantidad' => $cantidad]);
        $this->increment('stock', $cantidad);
    }
}
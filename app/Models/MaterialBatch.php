<?php
// filepath: /c:/laragon/www/IMAC/app/Models/MaterialBatch.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialBatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'material_id',
        'cantidad',
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
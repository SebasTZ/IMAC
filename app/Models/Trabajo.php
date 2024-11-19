<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    use HasFactory;

    /**
     * Get the pedido associated with the trabajo.
     */
    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }
}

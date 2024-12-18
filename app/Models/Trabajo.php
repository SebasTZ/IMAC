<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
        'trabajo_usuario_id',
        'fecha_ingreso',
        'fecha_culminacion',
        'observaciones',
        'observacion_texto',
        'conformidad_cliente',
        'conformidad_texto',
    ];

    protected $dates = [
        'fecha_ingreso',
        'fecha_culminacion',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function trabajoUsuario()
    {
        return $this->belongsTo(User::class, 'trabajo_usuario_id');
    }

    public function getFechaIngresoAttribute($value)
    {
        return Carbon::parse($value);
    }

    public function getFechaCulminacionAttribute($value)
    {
        return $value ? Carbon::parse($value) : null;
    }
}
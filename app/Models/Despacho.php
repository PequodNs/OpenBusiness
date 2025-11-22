<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Despacho extends Model
{
    // Si la tabla no sigue la convención (en plural)
    protected $table = 'despachos';

    // Si usas columnas de fechas (opcional)
    protected $dates = ['fecha']; // si hay una columna `fecha` que es de tipo fecha

    // Definir qué campos pueden ser asignados masivamente
    protected $fillable = [
        'numero',
        'fecha',
        'cliente',
        'estado',
    ];

    
}

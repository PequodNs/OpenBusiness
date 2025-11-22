<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    // Apuntar a la tabla existente
    protected $table = 'distribuidores';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'contacto',
        'telefono',
        'email',
        'direccion',
    ];
}
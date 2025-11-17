<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class historial extends Model
{
    protected $table = 'historial';

    protected $fillable = [
        'id_usuario',
        'accion',
        'detalles',
    ];

//con los comentarios explicare las relaciones que tiene el modelo Historial

//un historial pertenece a un usuario
public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    
}
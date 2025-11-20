<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';

    protected $fillable = [
        'id_producto',
        'ruta_imagen',
        'tipo'
    ];
//con los comentarios explicare las relaciones que tiene el modelo Imagen

//una imagen pertenece a un producto
public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
//un distruibdor puede tener una imagen

public function distribuidor()
    {
        return $this->belongsTo(Distribuidor::class, 'id_distribuidor');
    }

    
}




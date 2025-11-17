<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DetalleDespacho extends Model
{
    protected $table = 'detalle_despacho';

    protected $fillable = [
        'id_orden',
        'id_producto',
        'cantidad_recibida',
    ];

//con los comentarios explicare las relaciones que tiene el modelo DetalleDespacho

//un detalle de despacho pertenece a una orden de despacho
public function ordenDespacho()
    {
        return $this->belongsTo(OrdenDespacho::class, 'id_orden');
    } 

//un detalle de despacho pertenece a un producto
public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    
}

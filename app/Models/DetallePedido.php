<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table = 'detalle_pedido';

    protected $fillable = [
        'id_pedido',
        'id_producto',
        'cantidad',
        'precio_unitario',
    ];

//con los comentarios explicare las relaciones que tiene el modelo DetallePedido

//un detalle de pedido pertenece a un pedido
public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido');
    }
//un detalle de pedido pertenece a un producto
public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

}
<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';

    protected $fillable = [
        'id_distribuidor',
        'fecha_pedido',
        'fecha_entrega',
        'estado',
        'id_usuario',
    ];


//con los comentarios explicare las relaciones que tiene el modelo Pedido

//un pedido pertenece a un distribuidor
public function distribuidor()
    {
        return $this->belongsTo(Distribuidor::class, 'id_distribuidor');
    }

//un pedido pertenece a un usuario
public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

//un pedido puede tener muchos detalles de pedido
public function detallePedidos()
    {
        return $this->hasMany(DetallePedido::class, 'id_pedido');
    }
//un pedido puede tener una orden de despacho
public function ordenDespacho()
    {
        return $this->hasOne(OrdenDespacho::class, 'id_pedido');
    }
//un pedido puede tener muchos documentos
public function documentos()
    {
        return $this->hasMany(Documento::class, 'id_pedido');
    }

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    // Definimos la tabla si no es la pluralización por defecto
    protected $table = 'pedidos';

    // Los atributos que son asignables masivamente (mass assignable)
    protected $fillable = [
        'id_distribuidor',
        'fecha_pedido',
        'fecha_entrega',
        'estado',
        'id_usuario',
    ];

    // Especificamos que las columnas 'fecha_pedido' y 'fecha_entrega' son fechas
    protected $dates = [
        'fecha_pedido',
        'fecha_entrega',
    ];

    // Relación: Un pedido pertenece a un distribuidor
    public function distribuidor()
    {
        return $this->belongsTo(Distribuidor::class, 'id_distribuidor');
    }

    // Relación: Un pedido pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    // Relación: Un pedido puede tener muchos detalles de pedido
    public function detallePedidos()
    {
        return $this->hasMany(DetallePedido::class, 'id_pedido');
    }

    // Relación: Un pedido puede tener una orden de despacho
    public function ordenDespacho()
    {
        return $this->hasOne(OrdenDespacho::class, 'id_pedido');
    }

    // Relación: Un pedido puede tener muchos documentos
    public function documentos()
    {
        return $this->hasMany(Documento::class, 'id_pedido');
    }

    // Relación: Un pedido puede tener muchos historiales
    public function historial()
    {
        return $this->hasMany(Historial::class, 'id_pedido');
    }
}

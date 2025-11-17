<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'id_distribuidor',
    ];
    
    
//con los comentarios explicare las relaciones que tiene el modelo Producto

//un producto pertenece a un distribuidor
public function distribuidor()
    {
        return $this->belongsTo(Distribuidor::class, 'distribuidor_id');
    }
//un producto puede tener muchos detalles de pedido (osea un producto puede estar en muchos pedidos)
public function detallePedidos()
    {
        return $this->hasMany(DetallePedido::class, 'id_producto');
    }
//un producto puede tener muchos detalles de despacho (osea un producto puede estar en muchos despachos)
public function detalleDespachos()
    {
        return $this->hasMany(DetalleDespacho::class, 'id_producto');
    }
//un producto puede tener muchas imagenes
public function imagenes()
    {
        return $this->hasMany(Imagen::class, 'id_producto');
    }




};
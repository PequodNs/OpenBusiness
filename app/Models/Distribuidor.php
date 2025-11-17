<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Distribuidor extends Model
{
    protected $table = 'distribuidores';

    protected $fillable = [
        'nombre',
        'contacto',
        'telefono',
        'email',
        'direccion',
    ];


//con los comentarios explicare las relaciones que tiene el modelo Distribuidor

//un distribuidor puede tener muchos productos
public function productos()
    {
        return $this->hasMany(Producto::class, 'id_distribuidor');
    }
//un distribuidor puede tener muchos pedidos
public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'id_distribuidor');
    }   
//un distribuidor puede tener imagenes
public function imagenes()
    {
        return $this->hasMany(Imagen::class, 'id_distribuidor');
    }
};

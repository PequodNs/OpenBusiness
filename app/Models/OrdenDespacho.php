<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class OrdenDespacho extends Model
{
    protected $table = 'orden_despacho';

    protected $fillable = [
        'id_pedido',
        'fecha_recepcion',
        'estado',
    ];


//con los comentarios explicare las relaciones que tiene el modelo OrdenDespacho

//una orden de despacho pertenece a un pedido
public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido');
    }
//una orden de despacho puede tener muchos detalles de despacho
public function detalleDespachos()
    {
        return $this->hasMany(DetalleDespacho::class, 'id_orden');
    }
//una orden de despacho puede tener muchos documentos
public function documentos()
    {
        return $this->hasMany(Documento::class, 'id_despacho');
    }
   
    
}
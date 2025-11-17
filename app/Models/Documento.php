<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documentos';

    protected $fillable = [
        'nombre',
        'ruta_archivo',
        'tipo_documento',
        'id_pedido',
        'id_despacho',
    ];

 //con los comentarios explicare las relaciones que tiene el modelo Documento
 
    //un documento puede pertenecer a un pedido
    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido');
    }
    //un documento puede pertenecer a una orden de despacho
    public function ordenDespacho()
    {
        return $this->belongsTo(OrdenDespacho::class, 'id_despacho');
    }
    
}
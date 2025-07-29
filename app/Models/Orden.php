<?php

// app/Models/Orden.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = 'ordenes';
    protected $primaryKey = 'id_orden';
    protected $fillable = [
        'fecha_orden',
        'estado_orden',
        'id_cliente',
        'id_mesa',
        'id_producto',
        'id_tipoPago'
    ];


    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function mesa()
    {
        return $this->belongsTo(Mesa::class, 'id_mesa');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function tipoPago()
    {
        return $this->belongsTo(TipoPago::class, 'id_tipoPago');
    }

    public function factura()
    {
        return $this->hasOne(Factura::class, 'id_orden');
    }
}

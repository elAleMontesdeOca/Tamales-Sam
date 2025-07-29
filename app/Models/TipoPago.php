<?php

// app/Models/TipoPago.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoPago extends Model
{
    protected $primaryKey = 'id_tipoPago';

    public function ordenes()
    {
        return $this->hasMany(Orden::class, 'id_tipoPago');
    }

    public function facturas()
    {
        return $this->hasMany(Factura::class, 'id_tipoPago');
    }
}

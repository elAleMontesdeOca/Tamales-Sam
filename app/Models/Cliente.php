<?php

// app/Models/Cliente.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $primaryKey = 'id_cliente';

    public function ordenes()
    {
        return $this->hasMany(Orden::class, 'id_cliente');
    }

    public function facturas()
    {
        return $this->hasMany(Factura::class, 'id_cliente');
    }
}


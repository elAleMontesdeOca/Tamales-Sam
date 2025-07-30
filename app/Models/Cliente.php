<?php

// app/Models/Cliente.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Cliente extends Model
{
    use HasFactory;

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


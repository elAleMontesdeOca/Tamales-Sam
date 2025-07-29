<?php

// app/Models/Producto.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $primaryKey = 'id_producto';

    public function ordenes()
    {
        return $this->hasMany(Orden::class, 'id_producto');
    }
}


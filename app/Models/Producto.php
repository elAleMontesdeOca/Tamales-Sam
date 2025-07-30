<?php

// app/Models/Producto.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Producto extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_producto';

    public function ordenes()
    {
        return $this->hasMany(Orden::class, 'id_producto');
    }
}


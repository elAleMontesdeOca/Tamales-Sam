<?php

// app/Models/Mesa.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    protected $primaryKey = 'id_mesa';

    public function ordenes()
    {
        return $this->hasMany(Orden::class, 'id_mesa');
    }
}


<?php

// app/Models/Mesa.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Mesa extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_mesa';

    public function ordenes()
    {
        return $this->hasMany(Orden::class, 'id_mesa');
    }
}


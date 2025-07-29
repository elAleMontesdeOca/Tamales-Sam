<?php

// app/Models/Factura.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Factura extends Model
{
    use HasFactory;

    protected $table = 'facturas';
    protected $primaryKey = 'id_factura';

    protected $fillable = [
        'fecha_factura',
        'total',
        'id_cliente',
        'id_orden',
        'id_tipoPago',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function orden()
    {
        return $this->belongsTo(Orden::class, 'id_orden');
    }

    public function tipoPago()
    {
        return $this->belongsTo(TipoPago::class, 'id_tipoPago');
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Mesa;
use App\Models\Producto;
use App\Models\TipoPago;
use App\Models\Orden;
use App\Repositories\Interfaces\OrdenRepositoryInterface;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    protected $ordenRepository;

    public function __construct(OrdenRepositoryInterface $ordenRepository)
    {
        $this->ordenRepository = $ordenRepository;
    }

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


    public function index()
    {
        $ordenes = Orden::with(['cliente', 'mesa', 'producto', 'tipoPago'])->get();
        return view('ordenes.index', compact('ordenes'));
    }

    // Puedes agregar métodos create, store, edit, update, destroy aquí después

    public function create()
    {
        $clientes = Cliente::all();
        $mesas = Mesa::all();
        $productos = Producto::all();
        $tipoPago = TipoPago::all();

        return view('ordenes.create', compact('clientes', 'mesas', 'productos', 'tipoPago'));
        
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fecha_orden' => 'required|date',
            'estado_orden' => 'required|in:pendiente,preparando,entregado',
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_mesa' => 'required|exists:mesas,id_mesa',
            'id_producto' => 'required|exists:productos,id_producto',
            'id_tipoPago' => 'required|exists:tipo_pagos,id_tipoPago',
        ]);

        Orden::create($validated);

        return redirect()->route('ordenes.index')->with('success', 'Orden registrada correctamente.');
    }

    public function edit($id)
    {
        $orden = Orden::findOrFail($id);
        $clientes = Cliente::all();
        $mesas = Mesa::all();
        $productos = Producto::all();
        $tiposPago = TipoPago::all();

        return view('ordenes.edit', compact('orden', 'clientes', 'mesas', 'productos', 'tiposPago'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha_orden' => 'required|date',
            'estado_orden' => 'required|in:pendiente,preparando,entregado',
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_mesa' => 'required|exists:mesas,id_mesa',
            'id_producto' => 'required|exists:productos,id_producto',
            'id_tipoPago' => 'required|exists:tipo_pagos,id_tipoPago',
        ]);

        $orden = Orden::findOrFail($id);
        $orden->update($request->all());

        return redirect()->route('ordenes.index')->with('success', 'Orden actualizada correctamente.');
    }

    public function destroy($id)
    {
        $orden = Orden::findOrFail($id);
        $orden->delete();

        return redirect()->route('ordenes.index')->with('success', 'Orden eliminada correctamente.');
    }


}

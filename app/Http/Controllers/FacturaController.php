<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Orden;
use App\Models\Cliente;
use App\Models\TipoPago;

class FacturaController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facturas = Factura::with(['cliente', 'orden', 'tipoPago'])->get();

        return view('facturas.index', compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ordenes = Orden::all();
        $clientes = Cliente::all();
        $tiposPago = TipoPago::all();

        return view('facturas.create', compact('ordenes', 'clientes', 'tiposPago'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha_factura' => 'required|date',
            'total' => 'required|numeric|min:1',
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_orden' => 'required|exists:ordenes,id_orden',
            'id_tipoPago' => 'required|exists:tipo_pagos,id_tipoPago',
        ]);

        Factura::create($request->all());

        return redirect()->route('facturas.index')->with('success', 'Factura registrada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $factura = Factura::findOrFail($id);
        $clientes = Cliente::all();
        $ordenes = Orden::all();
        $tiposPago = TipoPago::all();

        return view('facturas.edit', compact('factura', 'clientes', 'ordenes', 'tiposPago'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha_factura' => 'required|date',
            'total' => 'required|numeric',
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_orden' => 'required|exists:ordenes,id_orden',
            'id_tipoPago' => 'required|exists:tipo_pagos,id_tipoPago',
        ]);

        $factura = Factura::findOrFail($id);
        $factura->update($request->all());

        return redirect()->route('facturas.index')->with('success', 'Factura actualizada correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $factura = Factura::findOrFail($id);
        $factura->delete();

        return redirect()->route('facturas.index')->with('success', 'Factura eliminada correctamente.');
    }

}

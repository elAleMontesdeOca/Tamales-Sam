@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de Facturas</h2>

    <a href="{{ route('facturas.create') }}" class="btn btn-success mb-3">Nueva Factura</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Cliente</th>
                <th>Orden</th>
                <th>Tipo de Pago</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($facturas as $factura)
                <tr>
                    <td>{{ $factura->id_factura }}</td>
                    <td>{{ $factura->fecha_factura }}</td>
                    <td>${{ number_format($factura->total, 2) }}</td>
                    <td>
                        {{ $factura->cliente->nom_cliente }} {{ $factura->cliente->app_cliente }}
                    </td>
                    <td>Orden #{{ $factura->orden->id_orden }}</td>
                    <td>{{ $factura->tipoPago->tipo_pago }}</td>
                    <td> 
                        <a href="{{ route('facturas.edit', $factura->id_factura) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('facturas.destroy', $factura->id_factura) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta factura?')">Eliminar</button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No hay facturas registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

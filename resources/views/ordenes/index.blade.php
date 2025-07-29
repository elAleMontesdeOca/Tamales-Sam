@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Listado de Órdenes</h1>

<a href="{{ route('ordenes.create') }}">Registrar nueva orden</a>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Mesa</th>
            <th>Producto</th>
            <th>Estado</th>
            <th>Tipo de Pago</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ordenes as $orden)
            <tr>
                <td>{{ $orden->id_orden }}</td>
                <td>{{ $orden->cliente->nom_cliente }} {{ $orden->cliente->app_cliente }}</td>
                <td>{{ $orden->mesa->num_mesa }}</td>
                <td>{{ $orden->producto->nom_producto }}</td>
                <td>{{ ucfirst($orden->estado_orden) }}</td>
                <td>{{ $orden->tipoPago->tipo_pago }}</td>
                <td>{{ $orden->fecha_orden }}</td>
                <td>
                    <a href="{{ route('ordenes.edit', $orden->id_orden) }}">Editar</a>
                    
                    <form action="{{ route('ordenes.destroy', $orden->id_orden) }}" method="POST" style="display:inline" onsubmit="return confirm('¿Estás seguro de eliminar esta orden?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Orden</h2>

    <form action="{{ route('ordenes.update', $orden->id_orden) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Fecha de Orden:</label>
        <input type="datetime-local" name="fecha_orden" value="{{ old('fecha_orden', \Carbon\Carbon::parse($orden->fecha_orden)->format('Y-m-d\TH:i')) }}" required><br><br>

        <label>Estado:</label>
        <select name="estado_orden" required>
            <option value="pendiente" {{ $orden->estado_orden == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="preparando" {{ $orden->estado_orden == 'preparando' ? 'selected' : '' }}>Preparando</option>
            <option value="entregado" {{ $orden->estado_orden == 'entregado' ? 'selected' : '' }}>Entregado</option>
        </select><br><br>

        <label>Cliente:</label>
        <select name="id_cliente" required>
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id_cliente }}" {{ $orden->id_cliente == $cliente->id_cliente ? 'selected' : '' }}>
                    {{ $cliente->nom_cliente }} {{ $cliente->app_cliente }}
                </option>
            @endforeach
        </select><br><br>

        <label>Mesa:</label>
        <select name="id_mesa" required>
            @foreach($mesas as $mesa)
                <option value="{{ $mesa->id_mesa }}" {{ $orden->id_mesa == $mesa->id_mesa ? 'selected' : '' }}>
                    Mesa {{ $mesa->num_mesa }}
                </option>
            @endforeach
        </select><br><br>

        <label>Producto:</label>
        <select name="id_producto" required>
            @foreach($productos as $producto)
                <option value="{{ $producto->id_producto }}" {{ $orden->id_producto == $producto->id_producto ? 'selected' : '' }}>
                    {{ $producto->nom_producto }}
                </option>
            @endforeach
        </select><br><br>

        <label>Tipo de Pago:</label>
        <select name="id_tipoPago" required>
            @foreach($tiposPago as $tipo)
                <option value="{{ $tipo->id_tipoPago }}" {{ $orden->id_tipoPago == $tipo->id_tipoPago ? 'selected' : '' }}>
                    {{ $tipo->tipo_pago }}
                </option>
            @endforeach
        </select><br><br>

        <button type="submit">Actualizar</button>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Registrar Nueva Orden</h2>

    <form action="{{ route('ordenes.store') }}" method="POST">
        @csrf

        <div>
            <label>Fecha de la orden:</label>
            <input type="datetime-local" name="fecha_orden" required>
        </div>

        <div>
            <label>Estado:</label>
            <select name="estado_orden" required>
                <option value="pendiente">Pendiente</option>
                <option value="preparando">Preparando</option>
                <option value="entregado">Entregado</option>
            </select>
        </div>

        <div>
            <label>Cliente:</label>
            <select name="id_cliente" required>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id_cliente }}">{{ $cliente->nom_cliente }} {{ $cliente->app_cliente }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Mesa:</label>
            <select name="id_mesa" required>
                @foreach($mesas as $mesa)
                    <option value="{{ $mesa->id_mesa }}">Mesa #{{ $mesa->num_mesa }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Producto:</label>
            <select name="id_producto" required>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id_producto }}">{{ $producto->nom_producto }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Tipo de Pago:</label>
            <select name="id_tipoPago" required>
                @foreach($tipoPagos as $tipoPago)
                    <option value="{{ $tipoPago->id_tipoPago }}" {{ old('id_tipoPago') == $tipoPago->id_tipoPago ? 'selected' : '' }}>
                        {{ ucfirst($tipoPago->tipo_pago) }}
                    </option>
                @endforeach
            </select>

        </div>

        <button type="submit">Guardar Orden</button>
    </form>
</div>
@endsection

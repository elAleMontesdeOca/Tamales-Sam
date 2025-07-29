@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Factura</h2>

    <form action="{{ route('facturas.update', $factura->id_factura) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Fecha de Factura</label>
            <input type="datetime-local" name="fecha_factura" class="form-control" value="{{ \Carbon\Carbon::parse($factura->fecha_factura)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="mb-3">
            <label>Total</label>
            <input type="number" name="total" class="form-control" value="{{ $factura->total }}" required>
        </div>

        <div class="mb-3">
            <label>Cliente</label>
            <select name="id_cliente" class="form-select" required>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id_cliente }}" {{ $cliente->id_cliente == $factura->id_cliente ? 'selected' : '' }}>
                        {{ $cliente->nom_cliente }} {{ $cliente->app_cliente }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Orden</label>
            <select name="id_orden" class="form-select" required>
                @foreach($ordenes as $orden)
                    <option value="{{ $orden->id_orden }}" {{ $orden->id_orden == $factura->id_orden ? 'selected' : '' }}>
                        Orden #{{ $orden->id_orden }} - {{ $orden->estado_orden }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tipo de Pago</label>
            <select name="id_tipoPago" class="form-select" required>
                @foreach($tiposPago as $tipo)
                    <option value="{{ $tipo->id_tipoPago }}" {{ $tipo->id_tipoPago == $factura->id_tipoPago ? 'selected' : '' }}>
                        {{ $tipo->tipo_pago }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Factura</button>
        <a href="{{ route('facturas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

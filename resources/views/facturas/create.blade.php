@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Registrar Factura</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups!</strong> Hubo algunos problemas con tus datos.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('facturas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="fecha_factura" class="form-label">Fecha de Factura</label>
            <input type="datetime-local" name="fecha_factura" class="form-control" value="{{ old('fecha_factura') }}" required>
        </div>

        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" name="total" class="form-control" step="0.01" value="{{ old('total') }}" required>
        </div>

        <div class="mb-3">
            <label for="id_cliente" class="form-label">Cliente</label>
            <select name="id_cliente" class="form-select" required>
                <option value="">Seleccione un cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id_cliente }}">
                        {{ $cliente->nom_cliente }} {{ $cliente->app_cliente }} {{ $cliente->apm_cliente }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_orden" class="form-label">Orden</label>
            <select name="id_orden" class="form-select" required>
                <option value="">Seleccione una orden</option>
                @foreach($ordenes as $orden)
                    <option value="{{ $orden->id_orden }}">
                        Orden #{{ $orden->id_orden }} - {{ $orden->fecha_orden }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_tipoPago" class="form-label">Tipo de Pago</label>
            <select name="id_tipoPago" class="form-select" required>
                <option value="">Seleccione un tipo de pago</option>
                @foreach($tiposPago as $tipo)
                    <option value="{{ $tipo->id_tipoPago }}">{{ $tipo->tipo_pago }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('facturas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

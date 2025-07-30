@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <h2 class="text-2xl font-bold mb-6 text-white">Editar Factura</h2>

    <form action="{{ route('facturas.update', $factura->id_factura) }}" method="POST" class="space-y-6 bg-white p-6 rounded-lg shadow">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700">Fecha de Factura</label>
            <input type="datetime-local" name="fecha_factura"
                   value="{{ \Carbon\Carbon::parse($factura->fecha_factura)->format('Y-m-d\TH:i') }}" required
                   class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Total</label>
            <input type="number" name="total" step="0.01" value="{{ $factura->total }}" required
                   class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Cliente</label>
            <select name="id_cliente" required
                    class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 bg-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id_cliente }}" {{ $cliente->id_cliente == $factura->id_cliente ? 'selected' : '' }}>
                        {{ $cliente->nom_cliente }} {{ $cliente->app_cliente }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Orden</label>
            <select name="id_orden" required
                    class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 bg-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @foreach($ordenes as $orden)
                    <option value="{{ $orden->id_orden }}" {{ $orden->id_orden == $factura->id_orden ? 'selected' : '' }}>
                        Orden #{{ $orden->id_orden }} - {{ ucfirst($orden->estado_orden) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Tipo de Pago</label>
            <select name="id_tipoPago" required
                    class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 bg-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @foreach($tiposPago as $tipo)
                    <option value="{{ $tipo->id_tipoPago }}" {{ $tipo->id_tipoPago == $factura->id_tipoPago ? 'selected' : '' }}>
                        {{ $tipo->tipo_pago }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('facturas.index') }}"
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded">
                Cancelar
            </a>
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                Actualizar Factura
            </button>
        </div>
    </form>
</div>
@endsection

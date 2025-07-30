@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <h2 class="text-2xl font-bold mb-6 text-white">Registrar Factura</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <strong class="font-bold">¡Ups!</strong> Hubo algunos problemas con tus datos.<br><br>
            <ul class="list-disc pl-5 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('facturas.store') }}" method="POST" class="space-y-6 bg-white p-6 rounded-lg shadow">
        @csrf

        <div>
            <label for="fecha_factura" class="block text-sm font-medium text-gray-700">Fecha de Factura</label>
            <input type="datetime-local" name="fecha_factura" value="{{ old('fecha_factura') }}" required
                   class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="total" class="block text-sm font-medium text-gray-700">Total</label>
            <input type="number" step="0.01" name="total" value="{{ old('total') }}" required
                   class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="id_cliente" class="block text-sm font-medium text-gray-700">Cliente</label>
            <select name="id_cliente" required
                    class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 bg-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">Seleccione un cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id_cliente }}">
                        {{ $cliente->nom_cliente }} {{ $cliente->app_cliente }} {{ $cliente->apm_cliente }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="id_orden" class="block text-sm font-medium text-gray-700">Orden</label>
            <select name="id_orden" required
                    class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 bg-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">Seleccione una orden</option>
                @foreach($ordenes as $orden)
                    <option value="{{ $orden->id_orden }}">
                        Orden #{{ $orden->id_orden }} - {{ $orden->fecha_orden }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="id_tipoPago" class="block text-sm font-medium text-gray-700">Tipo de Pago</label>
            <select name="id_tipoPago" required
                    class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 bg-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">Seleccione un tipo de pago</option>
                @foreach($tiposPago as $tipo)
                    <option value="{{ $tipo->id_tipoPago }}">{{ $tipo->tipo_pago }}</option>
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
                Guardar
            </button>
        </div>
    </form>
</div>
@endsection

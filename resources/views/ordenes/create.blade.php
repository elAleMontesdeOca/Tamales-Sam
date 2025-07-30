@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <h2 class="text-2xl font-bold mb-6 text-white">Registrar Nueva Orden</h2>

    <form action="{{ route('ordenes.store') }}" method="POST" class="space-y-6 bg-white p-6 rounded-lg shadow">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700">Fecha de la orden:</label>
            <input type="datetime-local" name="fecha_orden" required
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Estado:</label>
            <select name="estado_orden" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
                <option value="pendiente">Pendiente</option>
                <option value="preparando">Preparando</option>
                <option value="entregado">Entregado</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Cliente:</label>
            <select name="id_cliente" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id_cliente }}">{{ $cliente->nom_cliente }} {{ $cliente->app_cliente }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Mesa:</label>
            <select name="id_mesa" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
                @foreach($mesas as $mesa)
                    <option value="{{ $mesa->id_mesa }}">Mesa #{{ $mesa->num_mesa }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Producto:</label>
            <select name="id_producto" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
                @foreach($productos as $producto)
                    <option value="{{ $producto->id_producto }}">{{ $producto->nom_producto }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Tipo de Pago:</label>
            <select name="id_tipoPago" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
                @foreach($tipoPago as $tipoPago)
                    <option value="{{ $tipoPago->id_tipoPago }}" {{ old('id_tipoPago') == $tipoPago->id_tipoPago ? 'selected' : '' }}>
                        {{ ucfirst($tipoPago->tipo_pago) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('ordenes.index') }}"
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded">
                Cancelar
            </a>
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                Guardar Orden
            </button>
        </div>
    </form>
</div>
@endsection

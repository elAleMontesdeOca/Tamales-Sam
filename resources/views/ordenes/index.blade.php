@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6 text-white">Listado de Órdenes</h1>

    <div class="mb-4">
        <a href="{{ route('ordenes.create') }}"
           class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">
            + Registrar nueva orden
        </a>
    </div>

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Cliente</th>
                    <th class="px-6 py-3">Mesa</th>
                    <th class="px-6 py-3">Producto</th>
                    <th class="px-6 py-3">Estado</th>
                    <th class="px-6 py-3">Tipo de Pago</th>
                    <th class="px-6 py-3">Fecha</th>
                    <th class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ordenes as $orden)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $orden->id_orden }}</td>
                    <td class="px-6 py-4">{{ $orden->cliente->nom_cliente }} {{ $orden->cliente->app_cliente }}</td>
                    <td class="px-6 py-4">{{ $orden->mesa->num_mesa }}</td>
                    <td class="px-6 py-4">{{ $orden->producto->nom_producto }}</td>
                    <td class="px-6 py-4">{{ ucfirst($orden->estado_orden) }}</td>
                    <td class="px-6 py-4">{{ $orden->tipoPago->tipo_pago }}</td>
                    <td class="px-6 py-4">{{ $orden->fecha_orden }}</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ route('ordenes.edit', $orden->id_orden) }}"
                           class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-1 px-3 rounded text-sm">Editar</a>
                           
                        <form action="{{ route('ordenes.destroy', $orden->id_orden) }}" method="POST"
                              onsubmit="return confirm('¿Estás seguro de eliminar esta orden?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded text-sm">
                                    Eliminar
                                </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


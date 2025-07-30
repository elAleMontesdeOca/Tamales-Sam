@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6 text-white">Lista de Facturas</h2>

    <div class="mb-4">
        <a href="{{ route('facturas.create') }}"
           class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">
            + Nueva Factura
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Fecha</th>
                    <th class="px-6 py-3">Total</th>
                    <th class="px-6 py-3">Cliente</th>
                    <th class="px-6 py-3">Orden</th>
                    <th class="px-6 py-3">Tipo de Pago</th>
                    <th class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($facturas as $factura)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $factura->id_factura }}</td>
                        <td class="px-6 py-4">{{ $factura->fecha_factura }}</td>
                        <td class="px-6 py-4">${{ number_format($factura->total, 2) }}</td>
                        <td class="px-6 py-4">{{ $factura->cliente->nom_cliente }} {{ $factura->cliente->app_cliente }}</td>
                        <td class="px-6 py-4">Orden #{{ $factura->orden->id_orden }}</td>
                        <td class="px-6 py-4">{{ $factura->tipoPago->tipo_pago }}</td>
                        <td class="px-6 py-4 flex space-x-2">
                            <a href="{{ route('facturas.edit', $factura->id_factura) }}"
                               class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-1 px-3 rounded text-sm">
                                Editar
                            </a>

                            <form action="{{ route('facturas.destroy', $factura->id_factura) }}" method="POST"
                                  onsubmit="return confirm('¿Estás seguro de eliminar esta factura?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded text-sm">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">No hay facturas registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-900 py-12">
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-8">
        <div class="text-center mb-10">
        <img src="{{ asset('images/tamal.png') }}" alt="Tamal animado" class="rounded-full w-40 h-40 mx-auto mb-6 animate-bounce">

        <h1 class="text-3xl font-bold text-gray-800 text-center mb-6">¡Bienvenido a Tamales Sam!</h1>
        <p class="text-gray-600 mt-2 text-lg">El mejor sabor tradicional hecho con amor 🫔❤️</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <a href="{{ route('ordenes.index') }}"
                class="flex items-center justify-center bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-5 px-6 rounded-xl shadow-lg transition duration-300 text-xl text-center">
                📝 Ver Órdenes
            </a>

            <a href="{{ route('facturas.index') }}"
                class="flex items-center justify-center bg-green-500 hover:bg-green-600 text-white font-semibold py-5 px-6 rounded-xl shadow-lg transition duration-300 text-xl text-center">
                💵 Ver Facturas
            </a>
        </div>
    </div>
</div>
@endsection

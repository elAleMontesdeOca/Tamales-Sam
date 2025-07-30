<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tamalería Sam</title>
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased bg-yellow-50 text-gray-800">
        <div class="relative flex items-top justify-center min-h-screen bg-yellow-50 dark:bg-gray-900 sm:items-center sm:pt-0">

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <img src="https://cdn-icons-png.flaticon.com/512/1046/1046790.png" alt="Tamales" class="w-20 h-20 mr-4">
                    <h1 class="text-4xl font-extrabold text-red-600">Tamalería Sam</h1>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg p-6">
                    <div class="text-center">
                        <p class="text-xl text-gray-700 dark:text-gray-300 mb-4">
                            Sistema para gestión de ordenes y facturas de la "Tamaleria Sam".
                        </p>
                        <p class="text-md text-gray-500 dark:text-gray-400">
                            Acceso unico y exclusivo para empleados.
                        </p>
                    </div>
                </div>

                <div class="flex justify-center mt-8 space-x-4">
                    <a href="{{ route('login') }}" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">Login</a>
                    <a href="{{ route('register') }}" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 px-4 py-2 rounded-lg text-sm font-semibold">Register</a>
                </div>

                <div class="flex justify-center mt-12 text-sm text-gray-500 dark:text-gray-400">
                    &copy; {{ date('Y') }} Tamalería Sam · 
                </div>
            </div>
        </div>
    </body>
</html>
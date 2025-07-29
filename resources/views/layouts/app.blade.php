<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Tamales Sam')</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f8f8f8; }
    </style>
</head>
<body>
    <header>
        <h2>Tamales Sam</h2>
        <hr>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <hr>
        <p>&copy; {{ date('Y') }} Tamales Sam</p>
    </footer>
</body>
</html>

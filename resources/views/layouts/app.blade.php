<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace Test</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

    @include('layouts.navigation') <!-- Keep your existing nav -->

    <main class="py-8">
        <div class="container mx-auto px-4">
            @yield('content') <!-- Correct slot for normal Blade views -->
        </div>
    </main>

</body>
</html>

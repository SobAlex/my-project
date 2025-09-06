<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'SEO продвижение сайтов в интернете')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Train+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body x-data>
    <div class="max-w-7xl mx-auto px-6">
        @include('partials.header')

        <main>
            @if (session('status'))
                <div class="sticky top-0 z-50 mb-4 border border-green-300 bg-green-50 text-green-800 px-4 py-3"
                    role="status" aria-live="polite">
                    {{ session('status') }}
                </div>
            @endif

            @yield('content')
        </main>

        @include('partials.footer')
    </div>

    @include('partials.modals')
</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Aplikasi Kasir') }}</title>

    <!-- Fonts -->
    <link rel="icon" href="{{ asset('assets/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
                <div class="min-h-screen flex-1" style="background: linear-gradient(to bottom, #6d7af9 50%, #ffffff 50%);">

        <!-- Navbar di atas -->
        @include('layouts.navbar')
        <!-- Wrapper untuk Sidebar dan Konten -->
        <div class="flex ">
            <!-- Sidebar di kiri -->
            @include('layouts.sidebar')

            <!-- Konten di kanan -->
                <main class="flex-1 p-0 overflow-y-auto">

                @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow rounded mb-1 p-1">
                        {{ $header }}
                    </header>
                @endisset

                {{ $slot }}
            </main>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
</body>

</html>
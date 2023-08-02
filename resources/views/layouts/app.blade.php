<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

<<<<<<< HEAD
        <title>{{ config('app.name', 'BookTracker') }}</title>
=======
        <title>{{ config('app.name', 'Laravel') }}</title>
>>>>>>> Tugas-Dewa/main

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
<<<<<<< HEAD
        @include('layouts.navigation')
        @include('sweetalert::alert')
        @stack('scripts')
=======
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
>>>>>>> Tugas-Dewa/main

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

<<<<<<< HEAD
            @stack('scripts')

=======
>>>>>>> Tugas-Dewa/main
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>

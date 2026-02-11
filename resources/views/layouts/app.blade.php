<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-jig-bg text-jig-text">
    <div class="min-h-screen flex">
        @auth
            @include('layouts.sidebar')
        @endauth

        <div class="flex-1">
            {{-- Top bar --}}
            <div class="h-16 flex items-center justify-end px-6">
                @auth
                    <div class="text-sm text-jig-text/80">
                        {{ Auth::user()->name }} ({{ Auth::user()->role }})
                    </div>
                @endauth
            </div>

            @isset($header)
                <header class="px-6 pb-2">
                    {{ $header }}
                </header>
            @endisset

            <main class="px-6 pb-10">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>

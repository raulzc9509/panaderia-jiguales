<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased bg-jig-bg text-jig-text">
        <div class="min-h-screen grid grid-cols-1 lg:grid-cols-2">

            {{-- LADO IZQUIERDO (foto torta) --}}
            <div class="hidden lg:block relative">
                <img
                    src="{{ asset('img/login-cake.png') }}"
                    alt="Panadería Jiguales"
                    class="absolute inset-0 w-full h-full object-cover"
                >
                {{-- Overlay suave opcional para que no quede tan fuerte --}}
                <div class="absolute inset-0 bg-black/10"></div>
            </div>

            {{-- LADO DERECHO (formulario) --}}
            <div class="flex items-center justify-center p-6 lg:p-12">
                <div class="w-full max-w-md">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>

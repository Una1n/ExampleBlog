<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-gray-900 antialiased">
    <div class="antialiased dark:dark:bg-gray-800 dark:dark:text-gray-100">
        <div class="flex min-h-screen flex-col space-y-12">
            @include('layouts.header')
            <main class="container mx-auto max-w-3xl flex-1 space-y-12 px-6 xl:max-w-5xl">
                {{ $slot }}
            </main>
            @include('layouts.footer')
        </div>
    </div>
</body>

</html>

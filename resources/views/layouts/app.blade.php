<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="description" content="ResolutionLibrary">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{ $head ?? '' }}

    @stack('head')

    <link rel="stylesheet" href="/theme.css">

    <title>@yield('title', 'ResolutionLibrary')</title>
</head>

<body class="flex flex-col min-h-screen">
    @include('components.header')

    <div class="flex-grow snap-y">

        {{ $slot ?? '' }}

        @yield('content')
    </div>


    @include('components.footer')

    @stack('scripts')
</body>

</html>

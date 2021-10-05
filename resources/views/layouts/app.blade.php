<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        @stack('css')

        @livewireStyles

    </head>
    <body x-data="{ open: false, light: false, active:false, menuShow: true, logoScrol: false, services: false, video: false, contact: false }" class="font-sans antialiased lg:pr-14 lg:pl-36 bg-white" id="top">

        @include('layouts.partials.aside')

        <div class="min-h-screen">

            <div class="relative w-full">
                @livewire('navigation-menu')
            </div>

            <!-- Page Content -->
            <main class="pt-24">
                {{ $slot }}
            </main>

        </div>

        <div>
            @include('layouts.partials.footer')
        </div>

        @stack('modals')

        @livewireScripts

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <script>
            AOS.init();
        </script>

        @stack('scripts')

    </body>
</html>

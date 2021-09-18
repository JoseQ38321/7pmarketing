<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/material-icons.min.css') }}" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

</head>

<body class="font-sans antialiased">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
        <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
              class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden">
        </div>

        <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
            class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-blue-normal overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
            <div class="mt-8 px-6">
                <a class="flex items-center" href="{{ route('dashboard') }}">
                    <img class="h-7 w-auto mr-2" src="{{ asset('images/identity/light.svg') }}" alt="{{ config('app.name') }}">
                    <span class="text-white text-2xl">Marketing</span>
                </a>
            </div>
            <!-- Menú -->
            @include('layouts.partials.navigation-menu')
        </div>

        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-golden-normal">
                <div class="flex items-center">
                    <button @click="sidebarOpen = true" class="text-gray-500 hover:scale-105 transition-transform ease-in-out focus:outline-none lg:hidden flex items-center justify-center">
                        <span class="material-icons text-gray-500">menu</span>
                    </button>
                    <div class="relative mx-4 lg:mx-0">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                            <span class="material-icons text-gray-500">search</span>
                        </span>
                        <input class="w-40 sm:w-64 rounded-md border border-gray-400 pl-10 pr-4 focus:border-gray-500 transition ease-in-out" type="text" placeholder="Buscar...">
                    </div>
                </div>

                <div class="flex items-center">
                    <div x-data="{ notificationOpen: false }" class="relative">
                        <button @click="notificationOpen = ! notificationOpen"
                            class="flex mx-4 focus:outline-none">
                            <span class="material-icons-outlined text-golden-normal">notifications</span>
                        </button>

                        <div x-show="notificationOpen" @click="notificationOpen = false"
                            class="fixed inset-0 h-full w-full z-10" style="display: none;"></div>

                        <div x-show="notificationOpen"
                            class="absolute -right-6 md:right-0 mt-10 md:mt-4 w-80 bg-white rounded-lg shadow-xl overflow-hidden z-10"
                            style="display: none;">
                            <a href="#"
                                class="flex items-center px-4 py-3 text-gray-600 hover:text-white hover:bg-indigo-600 -mx-2">
                                <img class="h-8 w-8 rounded-full object-cover mx-1"
                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=334&amp;q=80"
                                    alt="avatar">
                                <p class="text-sm mx-2">
                                    <span class="font-bold" href="#">Sara Salah</span> replied on the <span
                                        class="font-bold text-indigo-400" href="#">Upload Image</span> artical . 2m
                                </p>
                            </a>
                        </div>
                    </div>

                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = ! dropdownOpen"
                            class="relative block h-9 w-9 rounded-full overflow-hidden shadow focus:outline-none">
                            <img class="h-full w-full object-cover"
                            src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                        </button>

                        <div x-show="dropdownOpen" @click="dropdownOpen = false"
                            class="fixed inset-0 h-full w-full z-10" style="display: none;"></div>

                        <!-- Menú de perfil -->
                        @include('layouts.partials.profile-menu')

                    </div>
                </div>
            </header>
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="mx-auto px-6 py-8">

                    <!-- Page Heading -->
                    @if (isset($header))
                        <h3 class="text-gray-700 text-3xl font-medium">
                            {{ $header }}
                        </h3>
                    @endif

                    <div class="mt-4">
                        {{ $slot }}
                    </div>

                </div>
            </main>
        </div>
    </div>

    @stack('modals')

    @livewireScripts

    @stack('scripts')

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>

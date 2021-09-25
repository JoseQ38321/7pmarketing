<nav x-data="{ open: false, light: false, active:false, menuShow: true }" class="bg-white absolute w-full z-50">
    <!-- Primary Navigation Menu -->
    <div>
        <div x-show="menuShow" @scroll.window="menuShow = (window.pageYOffset > 100) ? false : true" x-transition
            x-transition.duration.300ms class="flex h-24">
            <div class="flex justify-between w-full">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-10" x-on:light.window="light = true">
                    <a class="flex items-center gap-2" href="{{ route('dashboard') }}">
                        <img x-show="light" src="{{ asset('images/identity/light.svg') }}" class="block h-9 w-auto" />
                        <img x-show="!light" src="{{ asset('images/identity/dark.svg') }}" class="block h-9 w-auto" />
                        <span class="text-2xl font-semibold" :class="{ 'text-white': light }">Marketing</span>
                    </a>
                    <span class="" :class=" { 'text-white' : light }">T: +593 97 8927 327</span>
                </div>


                <!-- Navigation Links -->
                <div class="hidden space-x-6 sm:-my-px sm:flex sm:items-center" :class="{ 'text-white': light }">
                    <x-jet-nav-link href="{{ route('welcome') }}" :active="request()->routeIs('welcome')">
                        {{ __('Inicio') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="#">
                        {{ __('Recursos') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="#">
                        {{ __('Academia') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="#">
                        {{ __('Blog') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="#">
                        {{ __('Quienes Somos') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="#">
                        {{ __('Contacto') }}
                    </x-jet-nav-link>
                    <span class="" :class="{ 'bg-white': light }">
                        <svg class="ham hamRotate ham1 w-12" viewBox="0 0 100 100"
                            x-on:click="active = !active; light = !light; document.body.classList.toggle('overflow-hidden');"
                            :class="{ 'active': active }">
                            <path class="line top"
                                d="m 30,33 h 40 c 0,0 9.044436,-0.654587 9.044436,-8.508902 0,-7.854315 -8.024349,-11.958003 -14.89975,-10.85914 -6.875401,1.098863 -13.637059,4.171617 -13.637059,16.368042 v 40" />
                            <path class="line middle" d="m 30,50 h 40" />
                            <path class="line bottom"
                                d="m 30,67 h 40 c 12.796276,0 15.357889,-11.717785 15.357889,-26.851538 0,-15.133752 -4.786586,-27.274118 -16.667516,-27.274118 -11.88093,0 -18.499247,6.994427 -18.435284,17.125656 l 0.252538,40" />
                        </svg>
                    </span>
                </div>
            </div>

            <!-- Menu desplegable derecho -->
            <div x-show="active"
                x-transition
                x-transition.duration.300ms
                class="fixed -z-1 inset-0 overflow-hidden">
                <div class="flex h-full items-center justify-center bg-gray-800">
                    <p>menush</p>
                </div>
            </div>


            <div class="hidden sm:flex sm:items-center sm:ml-6">

                @auth
                    <!-- Settings Dropdown -->
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-jet-dropdown-link>

                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
                <div class="flex items-center px-4">
                    <div class="flex-shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}" />
                    </div>

                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>
            @endauth

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}"
                    :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

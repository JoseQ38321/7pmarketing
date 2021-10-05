<nav class="bg-white absolute w-full z-50 px-4 sm:px-8 xl:px-0">
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
                    <span class="hidden lg:block" :class=" { 'text-white' : light }">T: +593 97 8927 327</span>
                </div>


                <!-- Navigation Links -->
                <div class="hidden space-x-6 sm:-my-px lg:flex sm:items-center" :class="{ 'text-white': light }">
                    <x-jet-nav-link href="{{ route('welcome') }}" :active="request()->routeIs('welcome')">
                        {{ __('Inicio') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="#">
                        {{ __('Recursos') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="https://academia.7p-marketing.com/" target="_blank">
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
                x-cloak
                x-transition
                x-transition.duration.300ms
                class="fixed -z-1 inset-0 overflow-hidden">
                <div class="flex h-full items-center justify-center bg-ham-normal">
                    <div class="max-w-7xl grid grid-cols-2 gap-6">
                            <iframe src="https://open.spotify.com/embed/episode/7he1cBcdqd1q0EC2jxT1Zk" width="100%" height="232" frameBorder="4" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>
                        <div class="flex flex-col gap-5 text-white">
                            <span class="uppercase text-sm">pódcast</span>
                            <h4 class="font-semibold text-5xl">Un Mundo de Posibilidades con Rashel López</h4>
                            <span class="text-lg">Rashel Lopez</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hidden lg:flex sm:items-center">
                @auth
                    <!-- Settings Dropdown -->
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="flex focus:outline-none">
                                    <img class="h-8 w-8 object-cover object-center"
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
            <div class="-mr-2 flex items-center lg:hidden">
                <button class="" :class="{ 'bg-white': open }">
                    <svg class="ham hamRotate ham1 w-12" viewBox="0 0 100 100"
                        x-on:click="open = !open; light = !light; document.body.classList.toggle('overflow-hidden');"
                        :class="{ 'active': open }">
                        <path class="line top"
                            d="m 30,33 h 40 c 0,0 9.044436,-0.654587 9.044436,-8.508902 0,-7.854315 -8.024349,-11.958003 -14.89975,-10.85914 -6.875401,1.098863 -13.637059,4.171617 -13.637059,16.368042 v 40" />
                        <path class="line middle" d="m 30,50 h 40" />
                        <path class="line bottom"
                            d="m 30,67 h 40 c 12.796276,0 15.357889,-11.717785 15.357889,-26.851538 0,-15.133752 -4.786586,-27.274118 -16.667516,-27.274118 -11.88093,0 -18.499247,6.994427 -18.435284,17.125656 l 0.252538,40" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div x-show="open"
         x-cloak
         x-transition
         x-transition.duration.300ms
         class="fixed -z-1 inset-0 overflow-hidden">
         <div class="flex h-full items-center justify-end bg-ham-normal px-8 sm:px-12 md:px-20">
             <nav class="flex flex-col gap-6 text-white">
                 <a class="font-bold text-4xl sm:text-5xl text-right transform transition-all ease-in-out hover:scale-110" href="">Inicio</a>
                 <a class="font-bold text-4xl sm:text-5xl text-right transform transition-all ease-in-out hover:scale-110" href="">Recursos</a>
                 <a class="font-bold text-4xl sm:text-5xl text-right transform transition-all ease-in-out hover:scale-110" href="">Blog</a>
                 <a class="font-bold text-4xl sm:text-5xl text-right transform transition-all ease-in-out hover:scale-110" href="">Agencia</a>
                 <a class="font-bold text-4xl sm:text-5xl text-right transform transition-all ease-in-out hover:scale-110" href="https://academia.7p-marketing.com/" target="_blank">Academia</a>
             </nav>
         </div>
    </div>
</nav>

<div x-data="{ logoScrol: false }"
     @scroll.window="logoScrol = (window.pageYOffset > 100) ? true : false"
     class="left-0 h-screen w-36 bg-white fixed hidden lg:block">
    <div class="relative h-full flex flex-col items-center justify-center gap-4">

        <a x-show="logoScrol"
           x-transition
           x-transition.duration.300ms
           x-cloak
           href="/"
           class="mx-auto absolute top-10">
            <img class="h-9 w-auto" src="{{ asset('images/identity/dark.svg') }}" alt="{{ config('app.name') }}">
        </a>

        <a x-show="logoScrol"
           x-transition
           x-transition.duration.300ms
           x-cloak
           href="#top"
           class="mx-auto absolute bottom-10">
            <img class="h-8 w-auto" src="{{ asset('images/icons/icon-gotop.svg') }}" alt="{{ config('app.name') }}">
        </a>

        <a class="transform rotate-180 text-vertical font-bold text-sm uppercase" href="#">Facebook</a>
        <a class="transform rotate-180 text-vertical font-bold text-sm uppercase" href="#">Instagram</a>
        <a class="transform rotate-180 text-vertical font-bold text-sm uppercase" href="#">Spotify</a>
    </div>
</div>

<div x-clock @scroll.window="logoScrol = (window.pageYOffset > 100) ? true : false"
    class="left-0 h-screen w-36 fixed hidden lg:block">
    <div class="relative h-full flex flex-col items-center justify-center gap-4" :class="{ 'text-white' : services || video || contact }">

        <a x-show="logoScrol" x-transition x-transition.duration.300ms x-cloak href="/" class="mx-auto absolute top-10">
            <img x-show="services || video || contact " class="h-9 w-auto" src="{{ asset('images/identity/light.svg') }}"
                alt="{{ config('app.name') }}">
            <img x-show="!services" class="h-9 w-auto" src="{{ asset('images/identity/dark.svg') }}"
                alt="{{ config('app.name') }}" :class="{ 'opacity-0' : video || contact }">
        </a>

        <a x-show="logoScrol" x-transition x-transition.duration.300ms x-cloak href="#top"
            class="mx-auto absolute bottom-10">
            <svg :class="{ 'fill-white' : services || video || contact }" width="32" height="32" xmlns="http://www.w3.org/2000/svg">
                <g>
                    <path transform="rotate(-90 16.12120056152344,16.014461517333984)"
                    d="m31.945047,16.014647c0,-0.26406 -0.108789,-0.516253 -0.289774,-0.706139l-9.790016,-9.888915c-0.386695,-0.390651 -1.012726,-0.389662 -1.398432,0c-0.386695,0.389662 -0.386695,1.022616 0,1.412278l8.102799,8.183896l-27.283279,0c-0.545923,0 -0.98899,0.447024 -0.98899,0.99888s0.443068,0.99888 0.98899,0.99888l27.28229,0l-8.10181,8.183896c-0.386695,0.389662 -0.385706,1.022616 0,1.412278c0.386695,0.389662 1.012726,0.389662 1.398432,0l9.790016,-9.888915c0.184941,-0.186919 0.286807,-0.444057 0.289774,-0.706139z"/>
                </g>
            </svg>
        </a>

        <a class="transform rotate-180 text-vertical font-bold text-sm uppercase" href="https://www.facebook.com/7PMarketingInternacional" target="_blank">Facebook</a>
        <a class="transform rotate-180 text-vertical font-bold text-sm uppercase" href="https://www.instagram.com/7p_marketing/" target="_blank">Instagram</a>
        <a class="transform rotate-180 text-vertical font-bold text-sm uppercase" href="https://open.spotify.com/show/3MH73d3OIf4a0LQLPo36H4" target="_blank">Spotify</a>
    </div>
</div>

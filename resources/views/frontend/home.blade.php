<x-app-layout>

    <section class="md:max-w-3xl lg:max-w-7xl mx-auto mt-6 md:mt-12 mb-12 md:mb-24">
        <h1 class="text-gray-800 font-bold text-5xl sm:text-6xl md:text-8xl lg:text-9xl mx-4 text-center md:text-left lg:leading-150" data-aos="fade-up"
            data-aos-anchor-placement="center-bottom">
            7P Marketing
            Agencia Digital
        </h1>
    </section>

    <section class="relative" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
        <div class="glider-contain">
            <div class="glider">
                <div class="h-400 md:h-650 w-full bg-red-100 flex flex-col justify-center items-start gap-4 px-10 md:px-40 text-white bg-cover bg-center"
                    style="background-image: url('{{ asset('images/banner01.jpg') }}')">
                    <img class="h-16 w-auto filter-white" src="{{ asset('images/carico-logo.png') }}">
                    <h4 class="text-3xl md:text-5xl font-semibold md:w-1/2">Estrategia de marketing digital para CARICO</h4>
                    <a class="block md:mt-4 p-0 border-b-4 border-gray-600 hover:border-white transition ease-in-out"
                        href="">Ver Caso de estudio</a>
                </div>
                <div class="h-400 md:h-650 w-full bg-blue-100 flex flex-col justify-center items-start gap-4 px-10 md:px-40 text-white bg-cover bg-center"
                    style="background-image: url('{{ asset('images/banner02.jpg') }}')">
                    <img class="h-16 w-auto filter-white" src="{{ asset('images/carico-logo.png') }}">
                    <h4 class="text-3xl md:text-5xl font-semibold md:w-1/2">Estrategia de marketing digital para CARICO</h4>
                    <a class="block md:mt-4 p-0 border-b-4 border-gray-600 hover:border-white transition ease-in-out"
                        href="">Ver Caso de estudio</a>
                </div>
                <div class="h-400 md:h-650 w-full bg-gray-100 flex flex-col justify-center items-start gap-4 px-10 md:px-40 text-white bg-cover bg-center"
                    style="background-image: url('{{ asset('images/banner03.jpg') }}')">
                    <img class="h-16 w-auto filter-white" src="{{ asset('images/carico-logo.png') }}">
                    <h4 class="text-3xl md:text-5xl font-semibold md:w-1/2">Estrategia de marketing digital para CARICO</h4>
                    <a class="block md:mt-4 p-0 border-b-4 border-gray-600 hover:border-white transition ease-in-out"
                        href="">Ver Caso de estudio</a>
                </div>
                <div class="h-400 md:h-650 w-full bg-green-100 flex flex-col justify-center items-start gap-4 px-10 md:px-40 text-white bg-cover bg-center"
                    style="background-image: url('{{ asset('images/banner04.jpg') }}')">
                    <img class="h-16 w-auto filter-white" src="{{ asset('images/carico-logo.png') }}">
                    <h4 class="text-3xl md:text-5xl font-semibold md:w-1/2">Estrategia de marketing digital para CARICO</h4>
                    <a class="block md:mt-4 p-0 border-b-4 border-gray-600 hover:border-white transition ease-in-out"
                        href="">Ver Caso de estudio</a>
                </div>
            </div>

            <div class="w-full absolute bottom-10 md:top-1/2 flex justify-between">
                <button
                    class="text-white font-bold border-t border-transparent transition ease-in-out pl-8 hover:border-white prev text-left"
                    aria-label="Previous">PREV</button>
                <button
                    class="text-white font-bold border-t border-transparent transition ease-in-out pr-8 hover:border-white next text-right"
                    aria-label="Next">NEXT</button>
            </div>
        </div>
    </section>

    <section class="py-10 px-4 lg:px-0 md:py-36" :class="{ 'opacity-0' : services }">
        <div class="blog-mansory">
            <div class="space-y-3 block mb-24" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                <h3 class="font-semibold uppercase text-black">explora nuestros proyectos</h3>
                <p class="w-4/5 text-black">Estamos publicando constantemente nuevos proyectos. Añadiendo nueva
                    información. Trabajando para ayudar a que su negocio crezca en un nuevo mundo digital.</p>
                <a class="mt-4 inline-block uppercase font-semibold bg-gray-900 text-white py-3 px-7" href="{{ route('resource') }}">Leer
                    Mas</a>
            </div>
            @foreach ($resources as $resource)
                <div class="flex flex-col gap-2" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                    <div class="bg-gray-200">
                        <a href="{{ route('resource.show', $resource->slug) }}">
                            <img class="w-full h-auto object-cover object-center" src="{{ $resource->image }}" alt="{{ $resource->title }}">
                        </a>
                    </div>
                    <a href="{{ route('resource.show', $resource->slug) }}">
                        <h4 class="text-2xl">{{ $resource->title }}</h4>
                    </a>
                    <div class="mb-12">
                        @foreach ($resource->categories as $category)
                            <span class="text-sm">{{ $category->name }}</span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="py-10 md:py-36 px-4 lg:px-0 mx-auto max-w-7xl" id="services"
        @scroll.window="services = (window.pageYOffset >= (document.getElementById('services').offsetTop)-200 && window.pageYOffset <= (document.getElementById('services').offsetTop) + (document.getElementById('serviceGrid').offsetHeight)) ? true : false ">

        <div class="fixed -z-1 inset-0 overflow-hidden bg-ham-normal" x-cloak x-show="services"
            x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>

        <div class="mb-12 text-white space-y-2">
            <h3 class="font-semibold uppercase text-center md:text-left">Nuestros Servicios</h3>
            <p class="w-full md:w-2/5 text-center md:text-left">Estamos mejorando constantemente nuestros servicios. Añadiendo nuevas
                características y trabajando para ayudar a que su negocio crezca.</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-4 text-white" id="serviceGrid">
            <div
                class="border border-white flex flex-col gap-1 items-center justify-center w-full h-24 md:h-72 hover:bg-white transition-all ease-in-out hover:text-black">
                <span class="text-sm">01</span>
                <h3 class="font-bold uppercase">ADS</h3>
            </div>
            <div
                class="border border-white flex flex-col gap-1 items-center justify-center w-full  h-24 md:h-72 hover:bg-white transition-all ease-in-out hover:text-black">
                <span class="text-sm">02</span>
                <h3 class="font-bold uppercase">Marketing</h3>
            </div>
            <div
                class="border border-white flex flex-col gap-1 items-center justify-center w-full  h-24 md:h-72 hover:bg-white transition-all ease-in-out hover:text-black">
                <span class="text-sm">03</span>
                <h3 class="font-bold uppercase">Branding</h3>
            </div>
            <div
                class="border border-white flex flex-col gap-1 items-center justify-center w-full  h-24 md:h-72 hover:bg-white transition-all ease-in-out hover:text-black">
                <span class="text-sm">04</span>
                <h3 class="font-bold uppercase">Diseño Web</h3>
            </div>
            <div
                class="border border-white flex flex-col gap-1 items-center justify-center w-full  h-24 md:h-72 hover:bg-white transition-all ease-in-out hover:text-black">
                <span class="text-sm">05</span>
                <h3 class="font-bold uppercase">e-Learning</h3>
            </div>
            <div
                class="border border-white flex flex-col gap-1 items-center justify-center w-full  h-24 md:h-72 hover:bg-white transition-all ease-in-out hover:text-black">
                <span class="text-sm">06</span>
                <h3 class="font-bold uppercase">e-Commerce</h3>
            </div>
            <div
                class="border border-white flex flex-col gap-1 items-center justify-center w-full  h-24 md:h-72 hover:bg-white transition-all ease-in-out hover:text-black">
                <span class="text-sm">07</span>
                <h3 class="font-bold uppercase">SEO / SEM</h3>
            </div>
            <div
                class="border border-white flex flex-col gap-1 items-center justify-center w-full  h-24 md:h-72 hover:bg-white transition-all ease-in-out hover:text-black">
                <span class="text-sm">08</span>
                <h3 class="font-bold uppercase">UI-UX DESIGN</h3>
            </div>
        </div>
    </section>

    <section class="px-4 lg:px-0 max-w-7xl mx-auto" :class="{ 'opacity-0' : services }">
        <div class="grid grid-cols-1 md:grid-cols-3 pag-5">
            @foreach ($posts as $post)
                @if ($loop->first)
                    <div class="md:col-span-3 mb-14 border-b border-gray-400 pb-14">
                        <div class="mb-4">
                            @foreach ($post->categories as $category)
                                <span class="text-sm text-gray-500 inline-block">{{ $category->name }}</span>
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </div>
                        <a href="{{ route('blog.show', $post->slug) }}">
                            <h3 class="mb-4 text-4xl font-semibold md:w-4/5">{{ $post->title }}</h3>
                        </a>
                        <span>{{ $post->created_at->format('M d, Y') }}</span>
                    </div>
                @endif
                @if ($loop > $loop->first)
                    <div>
                        <div class="mb-4">
                            @foreach ($post->categories as $category)
                                <span class="text-sm text-gray-500 inline-block">{{ $category->name }}</span>
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </div>
                        <a href="{{ route('blog.show', $post->slug) }}">
                            <h3 class="mb-4 text-4xl font-semibold md:w-4/5">{{ $post->title }}</h3>
                        </a>
                        <span>{{ $post->created_at->format('M d, Y') }}</span>
                    </div>
                @endif
            @endforeach
        </div>
    </section>

    <section class="pt-16 md:pt-36 px-4 lg:px-0 max-w-7xl mx-auto" :class="{ 'opacity-0' : video }">
        <div class="mx-auto mb-16">
            <h3 class="text-center uppercase font-semibold mb-4">Trabajamos con la mejor tecnología</h3>
            <p class="text-center w-full mx-auto md:w-2/5">Nos esforzamos día a día para mentener altos estándares de
                calidad en cada uno de nuestros servicios</p>
        </div>
        <div class="mx-auto grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">
            <div class="p-2 mx-auto text-center">
                <img class="mx-auto h-10 md:h-14 w-auto mb-4 object-cover object-center"
                    src="{{ asset('images/icons/amazon-web-services.svg') }}">
                <h6 class="font-bold mx-auto text-sm uppercase w-2/3">Amazon Web Services</h6>
            </div>
            <div class="p-2 mx-auto text-center">
                <img class="mx-auto h-10 md:h-14 w-auto mb-4 object-cover object-center"
                    src="{{ asset('images/icons/digital-ocean.svg') }}">
                <h6 class="font-bold mx-auto text-sm uppercase w-2/3">Digital Ocean</h6>
            </div>
            <div class="p-2 mx-auto text-center">
                <img class="mx-auto h-10 md:h-14 w-auto mb-4 object-cover object-center"
                    src="{{ asset('images/icons/google-analytics.svg') }}">
                <h6 class="font-bold mx-auto text-sm uppercase w-2/3">Google Analytics</h6>
            </div>
            <div class="p-2 mx-auto text-center">
                <img class="mx-auto h-10 md:h-14 w-auto mb-4 object-cover object-center"
                    src="{{ asset('images/icons/Laravel.svg') }}">
                <h6 class="font-bold mx-auto text-sm uppercase w-2/3">Laravel Framework</h6>
            </div>
            <div class="p-2 mx-auto text-center">
                <img class="mx-auto h-10 md:h-14 w-auto mb-4 object-cover object-center"
                    src="{{ asset('images/icons/mailgun.svg') }}">
                <h6 class="font-bold mx-auto text-sm uppercase w-2/3">Mailgun</h6>
            </div>
            <div class="p-2 mx-auto text-center">
                <img class="mx-auto h-10 md:h-14 w-auto mb-4 object-cover object-center"
                    src="{{ asset('images/icons/symfony.svg') }}">
                <h6 class="font-bold mx-auto text-sm uppercase w-2/3">Symfony Framework</h6>
            </div>
        </div>
    </section>

    <section class="py-24 lg:py-36 mx-auto max-w-7xl" id="video"
        @scroll.window="video = (window.pageYOffset >= (document.getElementById('video').offsetTop)-250 && window.pageYOffset <= (document.getElementById('video').offsetTop) + (document.getElementById('videoContainer').offsetHeight)) ? true : false ">

        <div class="fixed -z-1 inset-0 overflow-hidden bg-ham-normal" x-cloak x-show="video"
            x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
        <div class="flex items-center justify-center p-4 md:p-8">
            <video id="videoContainer" autoplay muted playsinline
                src="{{ asset('assets/videos/pexels-mikael-blomkvist-6561920.mp4') }}"></video>
        </div>
    </section>

    <section class="px-4 lg:px-0 mx-auto max-w-7xl" :class="{ 'opacity-0' : video || contact }">
        <div class="mb-12 space-y-2">
            <h3 class="font-semibold uppercase text-2xl text-center md:text-left">CLIENTES SELECCIONADOS</h3>
            <p class="w-full md:w-2/5 text-center md:text-left">Conoce las marcas que trabajan con nosotros, estamos orgullosos de trabajar con los mejores!.</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-5">
            <div class="border p-4 md:p-8">
                <img class=" opacity-70 hover:opacity-100 transition ease-in-out" src="{{ asset('images/clients/logo01.png') }}" alt="">
            </div>
            <div class="border p-8">
                <img class=" opacity-70 hover:opacity-100 transition ease-in-out" src="{{ asset('images/clients/logo02.png') }}" alt="">
            </div>
            <div class="border p-8">
                <img class=" opacity-70 hover:opacity-100 transition ease-in-out" src="{{ asset('images/clients/logo03.png') }}" alt="">
            </div>
            <div class="border p-8">
                <img class=" opacity-70 hover:opacity-100 transition ease-in-out" src="{{ asset('images/clients/logo04.png') }}" alt="">
            </div>
            <div class="border p-8">
                <img class=" opacity-70 hover:opacity-100 transition ease-in-out" src="{{ asset('images/clients/logo05.png') }}" alt="">
            </div>
            <div class="border p-8">
                <img class=" opacity-70 hover:opacity-100 transition ease-in-out" src="{{ asset('images/clients/logo06.png') }}" alt="">
            </div>
            <div class="border p-8">
                <img class=" opacity-70 hover:opacity-100 transition ease-in-out" src="{{ asset('images/clients/logo07.png') }}" alt="">
            </div>
            <div class="border p-8">
                <img class=" opacity-70 hover:opacity-100 transition ease-in-out" src="{{ asset('images/clients/logo08.png') }}" alt="">
            </div>
            <div class="border p-8">
                <img class=" opacity-70 hover:opacity-100 transition ease-in-out" src="{{ asset('images/clients/logo09.png') }}" alt="">
            </div>
            <div class="border p-8">
                <img class=" opacity-70 hover:opacity-100 transition ease-in-out" src="{{ asset('images/clients/logo10.png') }}" alt="">
            </div>
            <div class="border p-8">
                <img class=" opacity-70 hover:opacity-100 transition ease-in-out" src="{{ asset('images/clients/logo11.png') }}" alt="">
            </div>
            <div class="border p-8">
                <img class=" opacity-70 hover:opacity-100 transition ease-in-out" src="{{ asset('images/clients/logo12.png') }}" alt="">
            </div>
            <div class="border p-8">
                <img class=" opacity-70 hover:opacity-100 transition ease-in-out" src="{{ asset('images/clients/logo13.png') }}" alt="">
            </div>
            <div class="border p-8">
                <img class=" opacity-70 hover:opacity-100 transition ease-in-out" src="{{ asset('images/clients/logo14.png') }}" alt="">
            </div>
            <div class="border p-8 hidden md:block">
                <img class=" opacity-70 hover:opacity-100 transition ease-in-out" src="{{ asset('images/clients/logo15.png') }}" alt="">
            </div>
        </div>
    </section>

    <section class="py-16 md:py-36 px-4 lg:px-0 mx-auto max-w-7xl" id="contact"
        @scroll.window="contact = (window.pageYOffset >= (document.getElementById('contact').offsetTop)-200 && window.pageYOffset <= (document.getElementById('contact').offsetTop) + (document.getElementById('contactContainer').offsetHeight)) ? true : false ">
        <div class="fixed -z-1 inset-0 overflow-hidden bg-ham-normal" x-cloak x-show="contact"
            x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
            <div id="contactContainer" class="flex flex-col gap-8 text-white">
                <span class="text-xl uppercase font-semibold">Trabaja con nuestro Team Pro</span>
                <h3 class="text-3xl sm:text-4xl md:text-6xl lg:text-8xl font-bold mb-3">¿Te gustaría tener un proyecto profesional? ¡Hablemos de eso!</h3>
                <div class="flex flex-col gap-1">
                    <a class="underline" href="mailto:info@7p-marketing.com">info@7p-marketing.com</a>
                    <span>o</span>
                    <a href="tel:+593978927327">+593 97 892 7327</a>
                </div>
            </div>
    </section>

    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
        <script>

            new Glider(document.querySelector('.glider'), {
                scrollLock: true,
                duration: .1,
                arrows: {
                    prev: '.prev',
                    next: '.next'
                }
            });

            window.addEventListener('load', videoScroll);
            window.addEventListener('scroll', videoScroll);

            function videoScroll() {

                if (document.querySelectorAll('video[autoplay]').length > 0) {
                    var windowHeight = window.innerHeight,
                        videoEl = document.querySelectorAll('video[autoplay]');

                    for (var i = 0; i < videoEl.length; i++) {

                        var thisVideoEl = videoEl[i],
                            videoHeight = thisVideoEl.clientHeight,
                            videoClientRect = thisVideoEl.getBoundingClientRect().top;

                        if (videoClientRect <= ((windowHeight) - (videoHeight * .5)) && videoClientRect >= (0 - (videoHeight *
                                .5))) {
                            thisVideoEl.play();
                        } else {
                            thisVideoEl.pause();
                        }

                    }
                }

            }
        </script>
    @endpush
</x-app-layout>

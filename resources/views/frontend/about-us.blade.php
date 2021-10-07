<x-app-layout>
    <section class="md:max-w-3xl lg:max-w-7xl mx-auto mt-6 md:mt-12 mb-8 md:mb-24 px-4 md:px-0" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
        <h1 class="w-full text-gray-800 font-bold text-5xl sm:text-6xl md:text-8xl lg:text-9xl md:leading-150">
            Nuestra Agencia
        </h1>
        <span class="block w-full text-xl md:text-3xl mt-2">La mejor agencia de marketing digital</span>
    </section>
    <section data-aos="fade-up" data-aos-anchor-placement="center-bottom">
        <video class="w-full object-cover h-400 md:h-650" autoplay muted playsinline loop
        src="{{ asset('assets/videos/about-us-banner.mp4') }}"></video>
    </section>
    <section class="py-6 px-4 lg:px-0 md:py-36 md:max-w-3xl lg:max-w-7xl mx-auto mt-12 mb-24" :class="{ 'opacity-0' : services }">
        <div class="mb-8" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
            <h2 class="text-gray-800 font-bold text-3xl sm:text-4xl md:text-5xl lg:text-7xl leading-250">
                Sobre Nosotros
            </h2>
            <span class="block mt-2 font-semibold">7P Marketing es una agencia de marketing digital que te ayudará a desarrollar tu marca en sus diferentes plataformas, con estrategias efectivas y ejecuciones eficaces logrando resultados que impulsan el crecimiento de la empresa.</span>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 overflow-y-hidden">
            <div data-aos="fade-right" data-aos-delay="400">
                <h3 class="font-bold text-gray-800 text-xl mb-3 uppercase">Misión</h3>
                <p>Como Agencia de Marketing Digital Creamos, ejecutamos y medimos estrategias digitales exitosas para nuestros clientes cumpliendo las expectativas acordadas; con ayuda de los mejores talentos, herramientas, procesos, prácticas, proveedores y creatividad basada en datos. Innovamos en nuestros procesos, servicios, productos y tecnología basados en datos.</p> <br>
                <p>Creemos en la consultoría digital y en la creatividad basada en datos. Utilizamos siempre herramientas de punta. Y si alguien más ya lo hizo en cualquier parte del mundo, nosotros también lo podemos hacer siempre un poco mejor.</p>
            </div>
            <div data-aos="fade-left" data-aos-delay="400">
                <h3 class="font-bold text-gray-800 text-xl mb-3 uppercase">Visión</h3>
                <p>Como Agencia de Marketing Digital Creamos, ejecutamos y medimos estrategias digitales exitosas para nuestros clientes cumpliendo las expectativas acordadas; con ayuda de los mejores talentos, herramientas, procesos, prácticas, proveedores y creatividad basada en datos. Innovamos en nuestros procesos, servicios, productos y tecnología basados en datos.</p>
                <p>Creemos en la consultoría digital y en la creatividad basada en datos. Utilizamos siempre herramientas de punta. Y si alguien más ya lo hizo en cualquier parte del mundo, nosotros también lo podemos hacer siempre un poco mejor.</p>
            </div>
        </div>
    </section>
    <section class="py-10 md:py-36 px-4 lg:px-0 mx-auto max-w-7xl" id="services"
        @scroll.window="services = (window.pageYOffset >= (document.getElementById('services').offsetTop)-200 && window.pageYOffset <= (document.getElementById('services').offsetTop) + (document.getElementById('contentServices').offsetHeight)) ? true : false ">

        <div class="fixed -z-1 inset-0 overflow-hidden bg-ham-normal" x-show="services"
            x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>

        <div :class="{ 'opacity-0' : !services }">
            <div class="mb-16 text-white space-y-2 md:w-3/5 mx-auto">
                <h3 class="font-semibold uppercase text-center">Nuestros Servicios</h3>
                <p class="text-center">Estamos mejorando constantemente nuestros servicios. Añadiendo nuevas
                    características y trabajando para ayudar a que su negocio crezca.</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-10 text-white" id="contentServices">
                <div class="flex items-center flex-col justify-center gap-2.5">
                    <img class="h-10 md:h-16 w-auto mx-auto filter-white" src="{{ asset('images/services/001-branding.png') }}" alt="Branding">
                    <span class="font-bold text-gray-light text-2xl md:text-4xl">01</span>
                    <h4 class="font-semibold text-lg md:text-xl -mt-8 text-center">Branding</h4>
                </div>
                <div class="flex items-center flex-col justify-center gap-2.5">
                    <img class="h-10 md:h-16 w-auto mx-auto filter-white" src="{{ asset('images/services/002-website-design.png') }}" alt="Branding">
                    <span class="font-bold text-gray-light text-2xl md:text-4xl">02</span>
                    <h4 class="font-semibold text-lg md:text-xl -mt-8 text-center">Diseño Web</h4>
                </div>
                <div class="flex items-center flex-col justify-center gap-2.5">
                    <img class="h-10 md:h-16 w-auto mx-auto filter-white" src="{{ asset('images/services/003-graphic-design.png') }}" alt="Branding">
                    <span class="font-bold text-gray-light text-2xl md:text-4xl">03</span>
                    <h4 class="font-semibold text-lg md:text-xl -mt-8 text-center">Diseño Gráfico</h4>
                </div>
                <div class="flex items-center flex-col justify-center gap-2.5">
                    <img class="h-10 md:h-16 w-auto mx-auto filter-white" src="{{ asset('images/services/004-copywriting.png') }}" alt="Branding">
                    <span class="font-bold text-gray-light text-2xl md:text-4xl">04</span>
                    <h4 class="font-semibold text-lg md:text-xl -mt-8 text-center">Copywriting</h4>
                </div>
                <div class="flex items-center flex-col justify-center gap-2.5">
                    <img class="h-10 md:h-16 w-auto mx-auto filter-white" src="{{ asset('images/services/005-multimedia.png') }}" alt="Branding">
                    <span class="font-bold text-gray-light text-2xl md:text-4xl">05</span>
                    <h4 class="font-semibold text-lg md:text-xl -mt-8 text-center">Multimedia</h4>
                </div>
                <div class="flex items-center flex-col justify-center gap-2.5">
                    <img class="h-10 md:h-16 w-auto mx-auto filter-white" src="{{ asset('images/services/006-digital-marketing.png') }}" alt="Branding">
                    <span class="font-bold text-gray-light text-2xl md:text-4xl">06</span>
                    <h4 class="font-semibold text-lg md:text-xl -mt-8 text-center">Marketing Digital</h4>
                </div>
                <div class="flex items-center flex-col justify-center gap-2.5">
                    <img class="h-10 md:h-16 w-auto mx-auto filter-white" src="{{ asset('images/services/007-time-management.png') }}" alt="Branding">
                    <span class="font-bold text-gray-light text-2xl md:text-4xl">07</span>
                    <h4 class="font-semibold text-lg md:text-xl -mt-8 text-center">Even Management</h4>
                </div>
                <div class="flex items-center flex-col justify-center gap-2.5">
                    <img class="h-10 md:h-16 w-auto mx-auto filter-white" src="{{ asset('images/services/008-mail.png') }}" alt="Branding">
                    <span class="font-bold text-gray-light text-2xl md:text-4xl">08</span>
                    <h4 class="font-semibold text-lg md:text-xl -mt-8 text-center">Automatización</h4>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-16 md:pt-36 px-4 lg:px-0 max-w-7xl mx-auto" :class="{ 'opacity-0' : services || video }">
        <div class="mx-auto mb-16">
            <h3 class="text-center uppercase font-semibold mb-4">Trabajamos con la mejor tecnología</h3>
            <p class="text-center mx-auto w-full md:w-2/5">Nos esforzamos día a día para mentener altos estándares de
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
    <section class="py-10 md:py-36 px-4 lg:px-0 mx-auto max-w-7xl" id="video"
        @scroll.window="video = (window.pageYOffset >= (document.getElementById('video').offsetTop)-250 && window.pageYOffset <= (document.getElementById('video').offsetTop) + (document.getElementById('contentTeam').offsetHeight)) ? true : false ">

        <div class="fixed -z-1 inset-0 overflow-hidden bg-ham-normal" x-show="video"
            x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
        <div class="text-white" :class="{ 'opacity-0' : !video }">
            <div class="mb-20">
                <h4 class="text-2xl font-semibold mb-2">Nuestro equipo</h4>
                <p class="w-full md:w-1/2">Estamos mejorando constantemente. Trabajando para ayudar a que su negocio crezca.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-5" id="contentTeam">
                <div class="flex flex-col">
                    <img class="w-full h-auto mb-3" src="{{ asset('images/team/team01.jpg') }}">
                    <h4 class="text-lg font-semibold">Rashel Lopez</h4>
                    <span class="text-gray-400 mb-1">Creative Director</span>
                    <ul class="flex gap-2 text-xs uppercase">
                        <li>Facebook</li>
                        <li>Instagram</li>
                        <li>Linkedin</li>
                    </ul>
                </div>
                <div class="flex flex-col">
                    <img class="w-full h-auto mb-3" src="{{ asset('images/team/team02.jpg') }}">
                    <h4 class="text-lg font-semibold">Alex Morales</h4>
                    <span class="text-gray-400 mb-1">Marketing Director</span>
                    <ul class="flex gap-2 text-xs uppercase">
                        <li>Facebook</li>
                        <li>Instagram</li>
                        <li>Linkedin</li>
                    </ul>
                </div>
                <div class="flex flex-col">
                    <img class="w-full h-auto mb-3" src="{{ asset('images/team/team03.jpg') }}">
                    <h4 class="text-lg font-semibold">José Alarcón</h4>
                    <span class="text-gray-400 mb-1">Senior Developer</span>
                    <ul class="flex gap-2 text-xs uppercase">
                        <li>Facebook</li>
                        <li>Instagram</li>
                        <li>GitHub</li>
                    </ul>
                </div>
                <div class="flex flex-col">
                    <img class="w-full h-auto mb-3" src="{{ asset('images/team/team04.jpg') }}">
                    <h4 class="text-lg font-semibold">Denis Olivares</h4>
                    <span class="text-gray-400 mb-1">ADS Director</span>
                    <ul class="flex gap-2 text-xs uppercase">
                        <li>Facebook</li>
                        <li>Instagram</li>
                        <li>Linkedin</li>
                    </ul>
                </div>
            </div>
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

    @push('scripts')
        <script>
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

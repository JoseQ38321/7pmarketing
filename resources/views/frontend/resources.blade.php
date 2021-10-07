<x-app-layout>
    <section class="md:max-w-3xl lg:max-w-7xl mx-auto mt-0 md:mt-12 mb-6 md:mb-24" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
        <h1 class="text-gray-800 font-bold text-5xl sm:text-6xl md:text-8xl lg:text-9xl md:mx-4 leading-150 text-center md:text-left">
            Recursos
        </h1>
    </section>
    <section data-aos="fade-up" data-aos-delay="300" class="h-650 w-full">
        <img class="w-full h-full object-cover object-center" src="{{ asset('images/slide01.jpg') }}" alt="">
    </section>
    <section>
        @livewire('frontend.resource-index')
    </section>
</x-app-layout>

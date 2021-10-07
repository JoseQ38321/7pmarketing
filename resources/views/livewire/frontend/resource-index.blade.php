<div>
    <section class="py-10 px-4 lg:px-0 md:py-36" :class="{ 'opacity-0' : services }">
        <div class="blog-mansory">
            <div class="space-y-3 block mb-24" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                <h3 class="font-semibold uppercase text-black">explora nuestros proyectos</h3>
                <p class="w-4/5 text-black">Estamos publicando constantemente nuevos proyectos. Añadiendo nueva
                    información. Trabajando para ayudar a que su negocio crezca en un nuevo mundo digital.</p>
                <a class="mt-4 inline-block uppercase font-semibold bg-gray-900 text-white py-3 px-7" href="#">Leer
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
        @if ($resources->hasMorePages())
            <div class="my-8 flex">
                <button class=" bg-black py-4 px-10 uppercase text-white font-bold text-sm" type="button" wire:click="loadMore">
                    {{ __('Cargar Más') }}
                </button>
            </div>
        @endif
    </section>
</div>

<x-app-layout>
    <section class="md:max-w-3xl lg:max-w-7xl mx-auto mt-0 md:mt-12 mb-6 md:mb-24" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
        <h3 class="text-gray-800 font-bold text-5xl sm:text-6xl md:text-8xl lg:text-9xl mx-4 leading-150">
            Recursos
        </h3>
    </section>
    <section data-aos="fade-up" data-aos-delay="300" class="h-400 md:h-650 w-full">
        <img class="w-full h-full object-cover object-center" src="{{ $resource->image }}" alt="$resource->title">
    </section>
    <section class="py-16 md:py-36 px-5 md:px-0 max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4">
            <div class="col-span-3 md:pr-24">
                <span class=" text-gray-300 text-sm block mb-2">{{ $resource->created_at->format('M d, Y') }}</span>
                <div class="flex mb-8 items-center gap-4">
                    <img class="h-16 w-16 rounded-full object-cover object-center" src="{{ $resource->user->profile_photo_url }}" alt="{{ $resource->user->name }}">
                    <span>Publicado por <u>{{ $resource->user->name }}</u></span>
                </div>
                <ul class="flex gap-2 mb-8">
                    @foreach ($resource->categories as $category)
                        <li class="bg-black py-1 px-2 text-xs text-white">{{ $category->name }}</li>
                    @endforeach
                </ul>
                <h1 class="text-gray-800 font-bold text-3xl sm:text-4xl md:text-5xl lg:text-6xl">
                    {{ $resource->title }}
                </h1>
                <div class="my-16">{!! $resource->content !!}</div>
                <div class="border p-8 border-gray-300">
                    <span class="text-semibold">Publicado en <u>
                        @foreach ($resource->categories as $category)
                            {{ $category->name }}
                            @if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </u></span>
                </div>
            </div>
            <div class="w-full h-content">
                <div class="p-8 border border-gray-200 mb-8">
                    <h5 class="uppercase block font-bold text-xl">Recursos Recientes</h5>
                    <div class="border-b-2 block border-gray-300 my-5"></div>
                    <div class="my-5 space-y-5">
                        @foreach ($recentResources as $resource)
                            <a class="block" href="{{ route('resource.show', $resource->slug) }}">{{ $resource->title }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="p-8 border border-gray-200 mb-8">
                    <h5 class="uppercase block font-bold text-xl">Categorías</h5>
                    <div class="border-b-2 block border-gray-300 my-5"></div>
                    <div class="my-5 space-y-5">
                        @foreach ($categories as $category)
                            <a class="block" href="">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

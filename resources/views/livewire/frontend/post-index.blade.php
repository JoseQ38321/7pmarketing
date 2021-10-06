<div class="grid grid-cols-1 md:grid-cols-4">
    <div class=" col-span-3 pr-24">
        @foreach ($posts as $post)
            <div class="w-full mb-24" data-aos="fade-up" data-aos-delay="100">
                <a class="mb-5 block" href="{{ route('blog.show', $post->slug) }}">
                    <img class="w-full h-480 object-cover object-center" src="{{ Storage::url($post->image()->first()->file_path) }}" alt="{{ $post->title }}">
                </a>
                <div class="flex mb-5 items-center gap-4">
                    <img class="h-16 w-16 rounded-full object-cover object-center" src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}">
                    <span>Publicado por <u>{{ $post->user->name }}</u></span>
                </div>
                <h3 class="font-bold text-4xl block mb-5">{{ $post->title }}</h3>
                <span class=" text-gray-500 text-sm block mb-3">{{ $post->created_at->format('d M, Y') }}</span>
                <p class="block mb-3">{{ $post->abstract }}</p>
                <a class="font-bold text-xl uppercase border-b-2 border-black pb-1.5" href="">Leer Más</a>
            </div>
        @endforeach
        @if ($posts->hasMorePages())
            <div class="my-8 flex">
                <button class=" bg-black py-4 px-10 uppercase text-white font-bold text-sm" type="button" wire:click="loadMore">
                    {{ __('Cargar Más') }}
                </button>
            </div>
        @endif
    </div>
    <div class="w-full h-content">
        <div class="p-8 border border-gray-200 mb-8">
            <input class="block mb-3 w-full py-4 px-2 border border-gray-200 focus:ring-0 focus:border-gray-200" type="text" wire:model="search" placeholder="Buscar ...">
            <button class=" bg-black py-4 px-10 uppercase text-white font-bold text-sm" wire:click="search">Buscar</button>
        </div>
        <div class="p-8 border border-gray-200 mb-8">
            <h5 class="uppercase block font-bold text-xl">Posts Recientes</h5>
            <div class="border-b-2 block border-gray-300 my-5"></div>
            <div class="my-5 space-y-5">
                @foreach ($recentPosts as $post)
                    <a class="block" href="">{{ $post->title }}</a>
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

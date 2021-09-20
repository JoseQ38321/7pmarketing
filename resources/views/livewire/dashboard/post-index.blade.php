<div class="bg-white p-5 rounded-lg">
    <div class="flex items-center justify-between">
        <div class="flex gap-2.5">
            <input class="rounded-lg border-gray-200 shadow-sm focus:ring-0" type="text" wire:model="search" placeholder="{{ __('Buscar un post') }}">
            <select class="rounded-lg border-gray-200 shadow-sm focus:ring-0" wire:model="category">
                <option value="all" selected>{{ __('Todos') }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex gap-2.5">
            <button class="py-1.5 px-4 rounded-lg border border-gray-200 shadow-sm bg-white text-gray-700 flex items-center justify-center">
                <span class="material-icons-outlined">more_vert</span>
            </button>
            <button class="py-1.5 px-4 rounded-lg border border-gray-200 shadow-sm bg-white text-gray-700">
                {{ __('Exportar') }}
            </button>
            <a href="{{ route('post.create') }}" class="flex items-center gap-1 py-1.5 px-4 rounded-lg border border-gray-200 shadow-sm bg-white text-gray-700">
                <span class="material-icons-outlined">add</span>
                {{ __('Nuevo Post') }}
            </a>
        </div>
    </div>
    <div class="overflow-x-auto my-5">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-xs">
                    <th class="py-3 px-6 text-left">{{ __('Título') }}</th>
                    <th class="py-3 px-6 text-left">{{ __('Autor') }}</th>
                    <th class="py-3 px-6 text-center">{{ __('Acciones') }}</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($posts as $post)
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center gap-4">
                                <img class="h-14 w-16 rounded-sm object-cover" src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}">
                                <div>
                                    <div>
                                        <a href="#" class="font-bold text-gray-800">{{ $post->title }}</a>
                                        <span class="inline ml-2">
                                            @if ($post->status === 0)
                                                {{ __('Borrador') }}
                                            @else
                                                {{ __('Publicado') }}
                                            @endif
                                        </span>
                                    </div>
                                    <p class="text-sm text-gray-600">
                                        {{ $post->summary }}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left w-64">
                            <div>
                                <p class="mb-2">{{ __('Publicado por') }}: <br> {{ $post->user->name }} {{ $post->created_at->diffForHumans() }}</p>
                                <div class="flex gap-2">
                                    @foreach ($post->categories as $category)
                                        <span class="text-xs bg-blue-200 rounded text-blue-600 px-2">
                                            {{ $category->name }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center">
                                <a href="#" class="w-4 mr-2 transform hover:text-green-500 hover:scale-110 transition-transform ease-in-out cursor-pointer">
                                    <svg class="h-4 w-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </a>
                                <a href="{{ route('post.edit', $post) }}" class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110 transition-transform ease-in-out cursor-pointer">
                                    <svg class="h-4 w-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                </a>
                                <div class="w-4 mr-2 transform hover:text-red-500 hover:scale-110 transition-transform ease-in-out cursor-pointer" wire:click="confirmPostDeletion( {{ $post->id }} )" wire:loading.attr="disabled">
                                    <svg class="h-4 w-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex justify-between px-4">
        <div>
            {{ $posts->links() }}
        </div>
        <div>
            <select class="rounded-lg border-gray-200 shadow-sm focus:ring-0" wire:model="perPage">
                <option value="15">15</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>

    <!-- Delete Post Confirmation Modal -->
    <x-jet-dialog-modal wire:model="confirmingPostDeletion">
        <x-slot name="title">
            {{ __('Delete Account') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this Post? Once this account is deleted, all resources and data will be permanently deleted.') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingPostDeletion', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deletePost({{ $confirmingPostDeletion }})" wire:loading.attr="disabled">
                {{ __('Delete Account') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>


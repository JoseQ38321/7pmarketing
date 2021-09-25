<div>
    <div class="my-8 grid grid-cols-6 gap-4">
        @foreach ($files as $file)
            <div class="relative hover:scale-110 transition-all ease-in-out cursor-pointer">
                <input class="absolute top-1.5 left-1.5 rounded border-gray-600" value="{{ $file->id }}" type="checkbox">
                <img class="w-full h-24 rounded object-cover object-center" src="{{ Storage::url($file->file_path) }}" alt="{{ $file->file_name }}" wire:click="showFileModal({{ $file->id }})">
            </div>
        @endforeach
    </div>
    @if ($files->hasMorePages())
        <div class="my-8 flex justify-center">
            <button type="button" class="btn-primary w-content" wire:click="loadMore">
                {{ __('Cargar más imágenes') }}
            </button>
        </div>
    @endif

    <!-- Image Modal -->
    <x-jet-dialog-modal wire:model="showFile">
        <x-slot name="title">
            {{ $fileName}}
        </x-slot>

        <x-slot name="content">
            <img class="w-full h-auto rounded object-cover object-center" src="{{ $filePath }}" alt="{{ $fileName }}">
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('showFile', false)" wire:loading.attr="disabled">
                {{ __('Cerrar') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>

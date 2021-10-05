<div>
    <div>
        <div class="flex">
            <button class="px-4 py-2 w-full" x-on:click.prevent="active = 0"
                x-bind:class="{'bg-gray-200 text-gray-700': active === 0}">Añadir nuevo</button>
            <button class="px-4 py-2 w-full" x-on:click.prevent="active = 1"
                x-bind:class="{'bg-gray-200 text-gray-700': active === 1}">Seleccionar Imágen</button>
        </div>
        <div>
            <div class="m-4 p-4" x-show="active === 0">
                <form wire:ignore action="{{ route('media.upload') }}" method="POST" class="dropzone" id="my-awesome-dropzone"></form>
            </div>
            <div class="m-4 p-4 overflow-y-auto" x-show.transition.in="active === 1">
                <div class="grid grid-cols-7 gap-4">
                    @foreach ($files as $file)
                        <label class="cursor-pointer relative transform transition-all ease-in-out hover:scale-110" for="{{ $file->id }}">
                            <img class="w-full h-24 rounded object-cover object-center"
                                src="{{ Storage::url($file->file_path) }}" alt="{{ $file->file_name }}">
                            <input x-model="path" class="rounded absolute top-1 left-1" type="radio" name="image"
                                value="{{ $file->file_path }}" id="{{ $file->id }}">
                        </label>
                    @endforeach
                </div>
                @if ($files->hasMorePages())
                    <div class="my-8 flex justify-center">
                        <button type="button" class="btn-primary w-content" wire:click="loadMore">
                            {{ __('Cargar más imágenes') }}
                        </button>
                    </div>
                @endif
            </div>
        </div>
        <div class="bg-gray-200 flex items-center justify-end py-3 px-4">
            <a class="btn-primary" href="#">Seleccionar Imagen</a>
        </div>
    </div>

    @push('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"
            integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"
                integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            Dropzone.options.myAwesomeDropzone = {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                init: function() {
                    this.on("complete", function(file) {
                        Livewire.emit('mediaUploaded');

                    });
                }
            };
        </script>
    @endpush

</div>

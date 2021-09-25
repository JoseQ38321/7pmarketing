<x-dashboard-layout>
    <x-slot name="header">
        {{ __('Blog / Crear') }}
    </x-slot>

    <div class="mx-auto py-8">
        @if (Session::has('flash.banner'))
            <div class="pb-4 rounded">
                <x-jet-banner />
            </div>
        @endif
        <div x-data="{ open: false }">
            {!! Form::open(['route' => 'post.store', 'files' => true]) !!}
            <div class="md:grid md:grid-cols-8 md:gap-6">
                <div class="md:col-span-6 bg-white py-5 px-4 rounded-md">
                    <div class="mb-3">
                        {!! Form::label('title', __('Title'), ['class' => 'form-label']) !!}
                        {!! Form::text('title', null, ['class' => 'form-input', 'placeholder' => __('Title of post')]) !!}
                        <x-jet-input-error for="title" />
                    </div>
                    <div class="mb-3">
                        {!! Form::label('abstract', __('Abstract'), ['class' => 'form-label']) !!}
                        {!! Form::textarea('abstract', null, ['class' => 'form-input', 'placeholder' => __('Abstract of post'), 'rows' => 4, 'maxlength ' => 250]) !!}
                        <x-jet-input-error for="abstract" />
                    </div>
                    <div class="mb-3">
                        {!! Form::label('content', null, ['class' => 'form-label']) !!}
                        <textarea class="form-input" name="content" id="content"></textarea>
                        <x-jet-input-error for="content" />
                    </div>
                </div>
                <div class="md:col-span-2">
                    <div class="mb-3 bg-white py-5 px-4 rounded-md">
                        {!! Form::label('status', __('Estado'), ['class' => 'form-label']) !!}
                        {!! Form::select('status', [0 => __('Borrador'), 1 => __('Publicado')], null, ['class' => 'form-input']) !!}
                        <x-jet-input-error for="status" />
                        <div class="mt-3">
                            {!! Form::submit(__('Crear Post'), ['class' => 'btn-primary w-full']) !!}
                        </div>
                    </div>
                    <div class="mb-3 bg-white py-5 px-4 rounded-md">
                        <label class="form-label">{{ __('Categorias') }}</label>
                        <div class="mt-2.5">
                            @foreach ($categories as $category)
                                <div class="flex items-center gap-2 text-gray-700">
                                    {!! Form::checkbox('categories[]', $category->id, null, ['class' => 'rounded', 'id' => $category->name]) !!}
                                    {!! Form::label($category->name, $category->name, ['class' => 'input-label']) !!}
                                </div>
                            @endforeach
                        </div>
                        <x-jet-input-error for="categories" />
                    </div>
                    <div class="mb-3 bg-white py-5 px-4 rounded-md">
                        <div x-data="{photoName: null, photoPreview: null}">
                            {!! Form::label('image', __('Imagen'), ['class' => 'form-label']) !!}
                            <input type="file" class="hidden" name="image" x-ref="photo" x-on:change="
                                                photoName = $refs.photo.files[0].name;
                                                const reader = new FileReader();
                                                reader.onload = (e) => {
                                                    photoPreview = e.target.result;
                                                };
                                                reader.readAsDataURL($refs.photo.files[0]);
                                        " />

                            <div class="mt-2 w-full border border-gray-400 rounded-md border-dashed flex items-center text-center h-28 hover:border-blue-60 cursor-pointer"
                                @click="open = true">
                                <p class="text-gray-600 w-full">{{ __('Cargar una nueva imagen') }}</p>
                            </div>

                            <div class="mt-2" x-show="photoPreview">
                                <span class="block rounded w-full h-28"
                                    x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                                </span>
                            </div>

                            <x-jet-secondary-button class="mt-2 text-sm" type="button" @click="open = true">
                                {{ __('Selecionar Imagen') }}
                            </x-jet-secondary-button>

                        </div>
                        <x-jet-input-error for="image" />
                    </div>
                </div>
                <div class="md:col-span-8 bg-white py-5 px-4 rounded-md">
                    <div class="mb-3">
                        {!! Form::label('meta_title', __('Meta Title'), ['class' => 'form-label']) !!}
                        {!! Form::text('meta_title', null, ['class' => 'form-input', 'placeholder' => __('Meta Title')]) !!}
                        <x-jet-input-error for="meta_title" />
                    </div>
                    <div class="mb-3">
                        {!! Form::label('meta_description', __('Meta Description'), ['class' => 'form-label']) !!}
                        {!! Form::textarea('meta_description', null, ['class' => 'form-input', 'placeholder' => __('Meta Description'), 'rows' => 4, 'maxlength ' => 250]) !!}
                        <x-jet-input-error for="meta_description" />
                    </div>
                    <div class="mb-3">
                        {!! Form::label('meta_keywords', __('Meta Keywords'), ['class' => 'form-label']) !!}
                        {!! Form::text('meta_keywords', null, ['class' => 'form-input', 'placeholder' => __('Meta Keywords')]) !!}
                        <x-jet-input-error for="meta_keywords" />
                    </div>
                    <div class="mb-3">
                        {!! Form::label('meta_robots', __('Indexar'), ['class' => 'form-label']) !!}
                        <div>
                            {!! Form::radio('meta_robots', 1, null, ['class' => 'form_control']) !!}
                            <span>Si</span>
                            {!! Form::radio('meta_robots', 0, null, ['class' => 'form_control']) !!}
                            <span>No</span>
                        </div>
                        <x-jet-input-error for="meta_robots" />
                    </div>
                </div>
            </div>
            {!! Form::close() !!}

            <!-- Select Image Modal -->
            <div class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-60 duration-300 flex items-center justify-center"
                x-show="open"
                x-transition:enter="transition duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">

                <div class="relative w-4/5 h-4/5 mx-2 sm:mx-auto opacity-100">
                    <div class="relative bg-white h-full shadow-lg rounded-lg text-gray-700 z-20 overflow-y-auto"
                        x-show="open"
                        @click.away="open = false"
                        x-transition:enter="transition transform duration-300"
                        x-transition:enter-start="scale-0"
                        x-transition:enter-end="scale-100"
                        x-transition:leave="transition transform duration-300"
                        x-transition:leave-start="scale-100"
                        x-transition:leave-end="scale-0">

                        <div x-data="{active: 1}">
                            <div class="flex">
                                <button class="px-4 py-2 w-full" x-on:click.prevent="active = 0" x-bind:class="{'bg-gray-200 text-gray-700': active === 0}">Añadir nuevo</button>
                                <button class="px-4 py-2 w-full" x-on:click.prevent="active = 1" x-bind:class="{'bg-gray-200 text-gray-700': active === 1}">Seleccionar Imágen</button>
                            </div>
                            <div>
                                <div class="m-4 p-2" x-show="active === 0">
                                    <form action="{{ route('media.upload') }}" method="POST" class="dropzone" id="my-awesome-dropzone"></form>
                                </div>
                                <div class="m-4 p-2 overflow-y-auto" x-show.transition.in="active === 1">
                                    @livewire('dashboard.media-upload')
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- Select Image Modal -->

        </div>
    </div>

    @push('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"
            integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush
    @push('scripts')
        <script src="https://cdn.tiny.cloud/1/n10qavr3k068jfmf4nlufnifrpct4w17tg2ch2e53ghffjrm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js" integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            tinymce.init({
                selector: '#content',
                language: 'es',
                plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                min_height: 600,
                toolbar_mode: 'floating',
            });

            Dropzone.options.myAwesomeDropzone = {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                init: function () {
                    this.on("complete", function (file) {
                        Livewire.emit('mediaUploaded');
                        
                    });
                }
            };
        </script>
    @endpush

</x-dashboard-layout>

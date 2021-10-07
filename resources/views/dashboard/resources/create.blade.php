<x-dashboard-layout>
    <x-slot name="header">
        {{ __('Recursos / Crear') }}
    </x-slot>

    <div class="mx-auto py-8">
        @if (Session::has('flash.banner'))
            <div class="pb-4 rounded">
                <x-jet-banner />
            </div>
        @endif
        <div x-data="{ open: false, active: 1, path: '' }">
            {!! Form::open(['route' => 'resource.store', 'files' => true]) !!}
            <div class="md:grid md:grid-cols-8 md:gap-6">
                <div class="md:col-span-6 bg-white py-5 px-4 rounded-md">
                    <div class="mb-3">
                        {!! Form::label('title', __('Título'), ['class' => 'form-label']) !!}
                        {!! Form::text('title', null, ['class' => 'form-input', 'placeholder' => __('Título del recurso')]) !!}
                        <x-jet-input-error for="title" />
                    </div>
                    <div class="mb-3">
                        {!! Form::label('abstract', __('Resumen'), ['class' => 'form-label']) !!}
                        {!! Form::textarea('abstract', null, ['class' => 'form-input', 'placeholder' => __('Resumen del recurso'), 'rows' => 4, 'maxlength ' => 250]) !!}
                        <x-jet-input-error for="abstract" />
                    </div>
                    <div class="mb-3">
                        {!! Form::label('content', 'Contenido', ['class' => 'form-label']) !!}
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
                            {!! Form::submit(__('Crear Recurso'), ['class' => 'btn-primary w-full']) !!}
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

                            <div x-show="!path" class="mt-2 w-full border border-gray-400 rounded-md border-dashed flex items-center text-center h-28 hover:border-blue-60 cursor-pointer"
                                @click="open = true">
                                <p class="text-gray-600 w-full">{{ __('Cargar una nueva imagen') }}</p>
                            </div>

                            <img x-show="path" class="w-full object-cover object-center rounded-md h-28" x-bind:src="'{{ config('app.url') }}'+'/storage/'+path">

                            <x-jet-secondary-button class="mt-2 text-sm" type="button" @click="open = true">
                                {{ __('Selecionar Imagen') }}
                            </x-jet-secondary-button>


                            <input x-show="path" class="w-full" type="hidden" name="image" x-bind:value="path">

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
            <div class="fixed inset-0 w-full h-full z-50 bg-black bg-opacity-60 duration-300 flex items-center justify-center"
                x-cloak
                x-show="open"
                x-transition:enter="transition duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">

                <div class="relative w-4/5 mx-2 sm:mx-auto opacity-100">
                    <div class="relative bg-white h-full shadow-lg rounded-lg text-gray-700 z-20 overflow-y-auto"
                        x-show="open"
                        @click.away="open = false"
                        x-transition:enter="transition transform duration-300"
                        x-transition:enter-start="scale-0"
                        x-transition:enter-end="scale-100"
                        x-transition:leave="transition transform duration-300"
                        x-transition:leave-start="scale-100"
                        x-transition:leave-end="scale-0">
                        <div>
                            @livewire('dashboard.select-image')
                        </div>
                    </div>
                </div>
            </div>
            <!-- Select Image Modal -->

        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.tiny.cloud/1/n10qavr3k068jfmf4nlufnifrpct4w17tg2ch2e53ghffjrm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: '#content',
                language: 'es',
                plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                min_height: 600,
                toolbar_mode: 'floating',
            });
        </script>
    @endpush

</x-dashboard-layout>

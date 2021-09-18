<x-dashboard-layout>
    <x-slot name="header">
        {{ __('Mensajes / Crear') }}
    </x-slot>

    <div class="mx-auto py-8">
        @if (Session::has('flash.banner'))
            <div class="pb-4 rounded">
                <x-jet-banner/>
            </div>
        @endif
        <div class="grid grid-cols-1 md:grid-cols-6 gap-5">
            <div class="md:col-span-2 bg-white rounded-lg p-4 h-content">
                <ul class="text-gray-700">
                    <li>Componer</li>
                    <li>Enviados</li>
                    <li>Bandeja de entrada</li>
                    <li>Sin Leer</li>
                    <li>Leidos</li>
                    <li>Eliminados</li>
                </ul>
            </div>
            <div class="bg-white p-4 rounded-lg md:col-span-4">
                {!! Form::open(['route' => 'message.store']) !!}
                <div class="flex flex-col gap-3">
                    <div>
                        {!! Form::label('to_user_id', 'Para:', ['class' => 'form-label']) !!}
                        {!! Form::hidden('to_user_id') !!}
                        <input class="form-input" type="text" value="{{ $user->name }}" readonly>
                    </div>
                    <div>
                        {!! Form::label('subject', 'Asunto:', ['class' => 'form-label']) !!}
                        {!! Form::text('subject', null, ['class' => 'form-input']) !!}
                        <x-jet-input-error for="subject"/>
                    </div>
                    <div>
                        {!! Form::label('message', 'Mensaje:', ['class' => 'form-label']) !!}
                        {!! Form::textarea('message', null, ['class' => 'form-input tinyMce']) !!}
                        <x-jet-input-error for="message"/>
                    </div>
                    <div>
                        {!! Form::submit('Enviar Mensaje', ['class' => 'btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.tiny.cloud/1/n10qavr3k068jfmf4nlufnifrpct4w17tg2ch2e53ghffjrm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: '.tinyMce',
                language: 'es',
                plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                min_height: 400,
                toolbar_mode: 'floating',
            });
        </script>
    @endpush

</x-dashboard-layout>

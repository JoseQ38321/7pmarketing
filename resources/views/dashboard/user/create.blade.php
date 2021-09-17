<x-dashboard-layout>
    <x-slot name="header">
        {{ __('Users') }}/{{ __('Create') }}
    </x-slot>

    <div class="mx-auto py-8">
        <div class="bg-white rounded-lg p-4">
            {!! Form::open() !!}
            <div class="grid grid-cols-2 gap-4">
                <div class="flex flex-col gap-2">
                    {!! Form::label('name', 'name', ['class' => 'text-gray-600']) !!}
                    {!! Form::text('name', null, ['class' => 'form-input rounded w-full', 'placeholder' => ]) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</x-dashboard-layout>

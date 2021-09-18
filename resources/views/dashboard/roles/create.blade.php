<x-dashboard-layout>
    <x-slot name="header">
        {{ __('Roles / Crear') }}
    </x-slot>

    <div class="mx-auto py-8">
        @if (Session::has('flash.banner'))
            <div class="pb-4 rounded">
                <x-jet-banner/>
            </div>
        @endif
        <div>
            {!! Form::open(['route' => 'role.store']) !!}
                <div class="grid grid-cols-6 gap-5">
                    <div class="col-span-2">
                        <h4 class="text-lg">{{ __('Role information') }}</h4>
                        <h5 class="text-sm text-gray-600">{{ __("Select the permissions assigned to the role") }}</h5>
                    </div>
                    <div class="rounded-xl bg-white col-span-4 p-5">
                        <div class="mb-4">
                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    {!! Form::label('name', __('Name'), ['class' => 'form-label']) !!}
                                    {!! Form::text('name', null, ['class' => 'form-input', 'placeholder' => __('Name')]) !!}
                                    @error('name')
                                        <p class="text-red-500 text-sm mt-2">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="text-gray-700">{{ __('Permissions') }}:</label>
                            <p class="text-gray-500 text-sm">{{ __('Select specific permissions for the role') }}</p>
                            <div class="mt-4" style="column-count: 3;">
                                @foreach ($permissions as $permission)
                                    <label class="block mb-2">
                                        {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-2 rounded border-gray-400 focus:ring-0']) !!}
                                        {{ $permission->description }}
                                    </label>
                                @endforeach
                            </div>
                            @error('permissions')
                                <p class="text-red-500 text-sm mt-2">
                                    {{ __('Selecciona uno o más permisos para el rol') }}
                                </p>
                            @enderror
                        </div>
                        <div class="flex justify-end">
                            {!! Form::submit(__('Crear rol'), ['class' => 'btn-primary']) !!}
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</x-dashboard-layout>

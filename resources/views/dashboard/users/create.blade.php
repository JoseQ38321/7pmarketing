<x-dashboard-layout>
    <x-slot name="header">
        {{ __('Users') }}/{{ __('Create') }}
    </x-slot>

    <div class="mx-auto py-8">
        @if (Session::has('flash.banner'))
            <div class="pb-4 rounded">
                <x-jet-banner/>
            </div>
        @endif
        {!! Form::open(['route' => 'user.store']) !!}
            <div class="md:grid md:grid-cols-3 gap-5 md:gap-10 mb-6">
                <div class="md:col-span-1 flex justify-between">
                    <div class="flex flex-col gap-2">
                        <h3 class="text-lg font-medium text-gray-900">{{ __('User information') }}</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('User information is available to all users.') }}
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                        <div class="grid grid-cols-2 gap-5">
                            <div class="col-span-2 md:col-span-1">
                                {!! Form::label('name', __('Name'), ['class' => 'form-label']) !!}
                                {!! Form::text('name', null, ['class' => 'form-input', 'placeholder' => __('Name')]) !!}
                                @error('name')
                                    <span class="text-red-700 text-sm mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-span-2 md:col-span-1">
                                {!! Form::label('email', __('Email'), ['class' => 'form-label']) !!}
                                {!! Form::email('email', null, ['class' => 'form-input', 'placeholder' => __('Email')]) !!}
                                @error('email')
                                    <span class="text-red-700 text-sm mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                {!! Form::label('password', __('Password'), ['class' => 'form-label']) !!}
                                {!! Form::password('password', ['class' => 'form-input', 'placeholder' => __('Password')]) !!}
                                @error('password')
                                    <span class="text-red-700 text-sm mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                        {!! Form::submit(__('Create user'), ['class' => 'btn-primary']) !!}
                    </div>
                </div>
            </div>

            <x-jet-section-border class="my-5" />

            <div class="md:grid md:grid-cols-3 gap-5 md:gap-10 mt-6">
                <div class="md:col-span-1 flex justify-between">
                    <div class="flex flex-col gap-2">
                        <h3 class="text-lg font-medium text-gray-900">{{ __('Roles and Permissions') }}</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Select roles ans permission for user') }}
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                        <div>
                            <h3 class="text-gray-700">{{ __('Roles') }}</h3>
                            <div class="grid grid-cols-3 gap-4 py-3">
                                @foreach ($roles as $role)
                                <div class="flex items-center">
                                    {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'rounded', 'id' => $role->name]) !!}
                                    <label class="text-gray-600 ml-2" for="{{ $role->name }}">{{ __($role->name) }}</label>
                                </div>
                                @endforeach
                            </div>
                            @error('roles')
                                <span class="text-red-700 text-sm mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <h3 class="text-gray-700">{{ __('Permissions') }}</h3>
                            <div class="grid grid-cols-3 gap-4 py-3">
                                @foreach ($permissions as $permission)
                                <div class="flex items-center">
                                    {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'rounded', 'id' => $permission->name]) !!}
                                    <label class="text-gray-600 ml-2" for="{{ $permission->name }}">{{ __($permission->description) }}</label>
                                </div>
                                @endforeach
                            </div>
                            @error('permission')
                                <span class="text-red-700 text-sm mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                        {!! Form::submit(__('Create user'), ['class' => 'btn-primary']) !!}
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</x-dashboard-layout>

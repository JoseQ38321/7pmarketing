<div class="bg-white p-5 rounded-lg">
    <div class="flex items-center justify-between">
        <div class="flex gap-2.5">
            <input class="rounded-lg border-gray-200 shadow-sm focus:ring-0" type="text" wire:model="search" placeholder="{{ __('Buscar un usuario') }}">
            <select class="rounded-lg border-gray-200 shadow-sm focus:ring-0" wire:model="roles">
                <option value="all" selected>{{ __('Todos') }}</option>
                @foreach ($allRoles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
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
            <a href="{{ route('user.create') }}" class="flex items-center gap-1 py-1.5 px-4 rounded-lg border border-gray-200 shadow-sm bg-white text-gray-700">
                <span class="material-icons-outlined">add</span>
                {{ __('Nuevo Usuario') }}
            </a>
        </div>
    </div>
    <div class="my-5">
        <table class="table-auto w-full overflow-x-auto">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2.5 px-4 font-normal text-sm text-gray-600 text-center">
                        <input class="rounded border border-gray-200 focus:ring-0 focus:ring-transparent text-golden-normal" type="checkbox">
                    </th>
                    <th class="py-2.5 font-normal text-sm text-gray-600 text-left">{{ __('Nombre') }}</th>
                    <th class="py-2.5 font-normal text-sm text-gray-600 text-left">{{ __('Email') }}</th>
                    <th class="py-2.5 font-normal text-sm text-gray-600 text-left">{{ __('Último Login') }}</th>
                    <th class="py-2.5 font-normal text-sm text-gray-600 text-left">{{ __('Roles') }}</th>
                    <th class="py-2.5 px-4 font-normal text-sm text-gray-600 flex items-center justify-center">
                        <span class="material-icons-outlined">tune</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="py-3 px-4 text-center">
                            <input class="rounded border border-gray-200 focus:ring-0 focus:ring-transparent text-golden-normal" type="checkbox">
                        </td>
                        <td class="py-3 text-left">
                            <div class="flex items-center gap-2">
                                <img class="h-8 w-8 object-cover object-center rounded-full" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                                <h6 class="text-sm text-gray-700">{{ $user->name }}</h6>
                            </div>
                        </td>
                        <td class="py-3 text-left">
                            <a class="text-sm text-gray-700" href="mailto:{{ $user->email }}">
                                {{ $user->email }}
                            </a>
                        </td>
                        <td class="py-3 text-left">
                            <span class="text-sm text-gray-700">
                                {{ $user->created_at->diffForHumans() }}
                            </span>
                        </td>
                        <td class="py-3 text-left">
                            <span class="text-sm text-gray-700">
                                {{ $user->roles->first()->name }}
                            </span>
                        </td>
                        <td class="py-3 px-4 flex items-center justify-center">
                            <div x-data="{ show: false }"  @click.away="show = false" class="relative">
                                <span @click="show = ! show" class="material-icons-outlined w-5 h-auto text-gray-600 cursor-pointer transition ease-in-out hover:scale-105">more_horiz</span>
                                <div x-show="show" class="absolute -right-4 bg-gray-50 z-10 shadow-md rounded p-4 w-40 flex flex-col gap-2">
                                    <a class="flex items-center gap-2 text-gray-600" href="{{ route('message.create', $user) }}">
                                        <span class="material-icons-outlined" style="font-size: 18px;">
                                            email
                                        </span>
                                        Enviar un mensaje
                                    </a>
                                    <a class="flex items-center gap-2 text-gray-600" href="#">
                                        <span class="material-icons-outlined" style="font-size: 18px;">
                                            open_in_new
                                        </span>
                                        Ver
                                    </a>
                                    <a href="{{ route('user.edit', $user) }}" class="flex items-center gap-2 text-gray-600" href="#">
                                        <span class="material-icons-outlined" style="font-size: 18px;">
                                            edit
                                        </span>
                                        Editar
                                    </a>
                                    <button class="rounded bg-red-600 text-white flex items-center justify-center gap-1 w-full py-2" wire:click="confirmUserDeletion( {{ $user->id }} )" wire:loading.attr="disabled">
                                        Eliminar
                                    </button>
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
            {{ $users->links() }}
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

    <!-- Delete User Confirmation Modal -->
    <x-jet-dialog-modal wire:model="confirmingUserDeletion">
        <x-slot name="title">
            {{ __('Borrar cuenta') }}
        </x-slot>

        <x-slot name="content">
            {{ __('¿Está seguro de que desea eliminar este usuario? Una vez que se elimine esta cuenta, todos los recursos y datos se eliminarán de forma permanente.') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingUserDeletion', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deleteUser({{ $confirmingUserDeletion }})" wire:loading.attr="disabled" >
                {{ __('Delete Account') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>

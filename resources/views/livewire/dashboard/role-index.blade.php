<div class="bg-white p-5 rounded-lg">
    <div class="flex items-center justify-end">
        <div class="flex gap-2.5">
            <button class="py-1.5 px-4 rounded-lg border border-gray-200 shadow-sm bg-white text-gray-700 flex items-center justify-center">
                <span class="material-icons-outlined">more_vert</span>
            </button>
            <button class="py-1.5 px-4 rounded-lg border border-gray-200 shadow-sm bg-white text-gray-700">
                {{ __('Exportar') }}
            </button>
            <a href="{{ route('role.create') }}" class="flex items-center gap-1 py-1.5 px-4 rounded-lg border border-gray-200 shadow-sm bg-white text-gray-700">
                <span class="material-icons-outlined">add</span>
                {{ __('Nuevo Rol') }}
            </a>
        </div>
    </div>
    <div class="overflow-hidden my-5">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <input class="rounded border-gray-400" type="checkbox">
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('Name') }}
                    </th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('Number of users') }}
                    </th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('Number of assigned permissions') }}
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($roles as $role)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <input class="rounded border-gray-400" type="checkbox" value="{{ $role->id }}">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $role->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">{{ $role->users->count() }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">{{ $role->permissions->count() }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                            <div class="flex item-center justify-center">
                                @can('role.edit')
                                    <a href="{{ route('role.edit', $role) }}">
                                        <div class="h-6 w-6 p-1 mr-2 transform text-gray-500 hover:text-green-500 hover:scale-110 hover:bg-green-100 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                    </a>
                                @endcan
                                @can('role.destroy')
                                    <button wire:click="confirmRoleDeletion( {{ $role->id }} )" wire:loading.attr="disabled">
                                        <div class="h-6 w-6 p-1 mr-2 transform text-gray-500 hover:text-red-500 hover:scale-110 hover:bg-red-200 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </button>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Delete Role Confirmation Modal -->
    <x-jet-dialog-modal wire:model="confirmingRoleDeletion">
        <x-slot name="title">
            {{ __('Delete Role') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this role? Once this role is eliminated, you will have to modify the roles and permissions of the users again.') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingRoleDeletion', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deleteRole({{ $confirmingRoleDeletion }})" wire:loading.attr="disabled">
                {{ __('Delete Role') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>

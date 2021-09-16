<div class="bg-white p-5 rounded-lg">
    <div class="flex items-center justify-between">
        <div class="flex gap-2.5">
            <input class="form-input rounded-lg border-gray-200 shadow-sm focus:ring-0" type="text" wire:model="search" placeholder="{{ __('Buscar un usuario') }}">
            <select class="form-input rounded-lg border-gray-200 shadow-sm focus:ring-0">
                <option value="all" selected>{{ __('Todos') }}</option>
                <option value="admin">{{ __('Administrador') }}</option>
                <option value="admin">{{ __('Editor') }}</option>
                <option value="admin">{{ __('Colaborador') }}</option>
            </select>
        </div>
        <div class="flex gap-2.5">
            <button class="py-1.5 px-4 rounded-lg border border-gray-200 shadow-sm bg-white text-gray-700">
                <x-simpleline-options-vertical class="h-5 w-auto"/>
            </button>
            <button class="py-1.5 px-4 rounded-lg border border-gray-200 shadow-sm bg-white text-gray-700">
                {{ __('Exportar') }}
            </button>
            <button class="flex items-center gap-2 py-1.5 px-4 rounded-lg border border-gray-200 shadow-sm bg-white text-gray-700">
                <x-fas-plus class="h-4 w-auto"/>
                {{ __('Nuevo Usuario') }}
            </button>
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
                    <th class="py-2.5 px-4 font-normal text-sm text-gray-600 text-center">
                        <x-carbon-settings-adjust-32 class="h-4 w-auto"/>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="py-2 px-4 text-center">
                            <input class="rounded border border-gray-200 focus:ring-0 focus:ring-transparent text-golden-normal" type="checkbox">
                        </td>
                        <td class="py-2 text-left">
                            <div class="flex items-center gap-2">
                                <img class="h-8 w-8 object-cover object-center rounded-full" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                                <h6 class="text-sm text-gray-700">{{ $user->name }}</h6>
                            </div>
                        </td>
                        <td class="py-2 text-left">
                            <a class="text-sm text-gray-700" href="mailto:{{ $user->email }}">
                                {{ $user->email }}
                            </a>
                        </td>
                        <td class="py-2 text-left">
                            <span class="text-sm text-gray-700">
                                {{ $user->created_at->diffForHumans() }}
                            </span>
                        </td>
                        <td class="py-2 text-left">
                            <span class="text-sm text-gray-700">
                                {{ $user->roles->first()->name }}
                            </span>
                        </td>
                        <td class="py-2 px-4 text-center">
                            <x-entypo-dots-three-horizontal class="w-5 h-auto text-gray-700"/>
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
            <select class="form-input rounded-lg border-gray-200 shadow-sm focus:ring-0" wire:model="perPage">
                <option value="15">15</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>
</div>

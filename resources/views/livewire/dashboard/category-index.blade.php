<div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white rounded-lg py-10 px-8 h-content">
            <div class="flex flex-col gap-5">
                <h3>{{ __('Añadir nueva categoría') }}</h3>
                <div class="flex flex-col gap-4">
                    <div>
                        <label class="form-label ">{{ __('Nombre de la categoría') }}</label>
                        <input class="form-input" type="text" wire:model="name" placeholder="Nombre de la categoría">
                    </div>
                </div>
                <button class="btn-primary" type="button" wire:click="addCategory">
                    {{ __('Añadir Categoría') }}
                </button>
            </div>
        </div>
        <div class="col-span-2 bg-white rounded-lg py-10 px-8">
            <table class="bg-white min-w-max w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-xs leading-normal">
                        <th class="py-3 px-6 text-left">{{ __('Name') }}</th>
                        <th class="py-3 px-6 text-left">{{ __('Slug') }}</th>
                        <th class="py-3 px-6 text-left">{{ __('Badge') }}</th>
                        <th class="py-3 px-6 text-center">{{ __('Acciones') }}</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($categories as $category)
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="py-3 px-6 text-left">
                                {{ $category->name }}
                            </td>
                            <td class="py-3 px-6 text-left">
                                {{ $category->slug }}
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span class="py-1 px-3 text-xs text-white bg-black">{{ $category->name }}</span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <button class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110 transition-transform ease-in-out cursor-pointer" wire:click="showModalEdit( {{ $category->id }} )" wire:loading.attr="disabled">
                                        <svg class="h-4 w-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                    </button>
                                    <button class="w-4 mr-2 transform hover:text-red-500 hover:scale-110 transition-transform ease-in-out cursor-pointer" wire:click="confirmCategoryDeletion( {{ $category->id }} )" wire:loading.attr="disabled">
                                        <svg class="h-4 w-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Category Confirmation Modal -->
    <x-jet-dialog-modal wire:model="confirmCategoryDeletion">
        <x-slot name="title">
            {{ __('Eliminar ategoría') }}
        </x-slot>

        <x-slot name="content">
            {{ __('¿Estás seguro de que deseas eliminar esta categoría?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmCategoryDeletion', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deleteCategory({{ $confirmCategoryDeletion }})" wire:loading.attr="disabled">
                {{ __('Eliminar ategoría') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    <!-- Edit Category Modal -->
    <x-jet-dialog-modal wire:model="showModalEdit">
        <x-slot name="title">
            {{ __('Editar categoría') }}
        </x-slot>

        <x-slot name="content">
            <div class="flex flex-col gap-4">
                <div>
                    <label class="form-label ">{{ __('Nombre de la categoría') }}</label>
                    <input class="form-input" type="text" wire:model="name">
                </div>
                <div>
                    <label class="form-label ">{{ __('Slug de la categoría') }}</label>
                    <input class="form-input" type="text" wire:model="slug">
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('showModalEdit', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <button type="button" class="ml-2 btn-primary" wire:click="editCategory({{ $showModalEdit }})" wire:loading.attr="disabled">
                {{ __('Editar Categoría') }}
            </button>
        </x-slot>
    </x-jet-dialog-modal>

</div>

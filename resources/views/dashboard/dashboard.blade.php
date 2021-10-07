<x-dashboard-layout>
    <x-slot name="header">
        {{ __('Escritorio') }}
    </x-slot>

    <div class="mx-auto py-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <x-jet-welcome />
        </div>
    </div>
</x-dashboard-layout>

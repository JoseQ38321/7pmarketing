<x-dashboard-layout>
    <x-slot name="header">
        {{ __('Users') }}
    </x-slot>

    <div class="mx-auto py-8">
        <div class="py-4 rounded">
            <x-jet-banner/>
        </div>
        @livewire('dashboard.user-index')
    </div>
</x-dashboard-layout>

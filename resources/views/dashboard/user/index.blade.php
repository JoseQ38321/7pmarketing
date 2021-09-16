<x-dashboard-layout>
    <x-slot name="header">
        {{ __('Users') }}
    </x-slot>

    <div class="mx-auto py-8">
        @livewire('dashboard.user-index')
    </div>
</x-dashboard-layout>

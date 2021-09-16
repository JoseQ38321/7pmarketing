<x-dashboard-layout>
    <x-slot name="header">
        {{ __('API Tokens') }}
    </x-slot>

    <div>
        <div class="mx-auto py-8">
            @livewire('api.api-token-manager')
        </div>
    </div>
</x-dashboard-layout>

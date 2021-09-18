<x-dashboard-layout>
    <x-slot name="header">
        {{ __('Users') }}
    </x-slot>

    <div class="mx-auto py-8">
        @if (Session::has('flash.banner'))
            <div class="pb-4 rounded">
                <x-jet-banner/>
            </div>
        @endif
        @livewire('dashboard.user-index')
    </div>
</x-dashboard-layout>

<x-dashboard-layout>
    <x-slot name="header">
        {{ __('Biblioteca de medios') }}
    </x-slot>

    <div class="mx-auto py-8">
        @if (Session::has('flash.banner'))
            <div class="pb-4 rounded">
                <x-jet-banner/>
            </div>
        @endif
        @livewire('dashboard.media-upload')
    </div>
</x-dashboard-layout>

<x-dashboard-layout>
    <x-slot name="header">
        {{ __('Mis Mensages') }}
    </x-slot>

    <div class="mx-auto py-8">
        @if (Session::has('flash.banner'))
            <div class="pb-4 rounded">
                <x-jet-banner/>
            </div>
        @endif
        mis mensajes
    </div>
</x-dashboard-layout>

<x-dashboard-layout>
    <x-slot name="header">
        {{ __('Mensajes / Inbox') }}
    </x-slot>

    <div class="mx-auto py-8">
        @if (Session::has('flash.banner'))
            <div class="pb-4 rounded">
                <x-jet-banner/>
            </div>
        @endif
        <div class="grid grid-cols-1 md:grid-cols-6 gap-5">
            <div class="md:col-span-2 bg-white rounded-lg p-4 h-content">
                @include('dashboard.messages.partials.message-menu')
            </div>
            <div class="md:col-span-4">
                @livewire('dashboard.messages.inbox')
            </div>
        </div>
    </div>

</x-dashboard-layout>

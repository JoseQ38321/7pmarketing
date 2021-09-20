<ul>
    <x-nav-message href="{{ route('message.create') }}" :active="request()->routeIs('message.create')">
        <span class="material-icons-outlined text-gray-500 mr-2">chat</span>
        Componer
    </x-nav-message>
    <x-nav-message href="{{ route('message.inbox') }}" :active="request()->routeIs('message.inbox')">
        <span class="material-icons-outlined text-gray-500 mr-2">inbox</span>
        Bandeja de entrada
    </x-nav-message>
    <x-nav-message href="{{ route('message.outbox') }}" :active="request()->routeIs('message.outbox')">
        <span class="material-icons-outlined text-gray-500 mr-2">outbox</span>
        Mensajes enviados
    </x-nav-message>
</ul>


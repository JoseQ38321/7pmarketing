<nav class="mt-10">
    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        <span class="material-icons-outlined h-6 w-auto mr-3">dashboard</span>
        {{ __('Dashboard') }}
    </x-nav-link>
    <x-nav-link href="{{ route('media') }}" :active="request()->routeIs('media')">
        <span class="material-icons-outlined h-6 w-auto mr-3">perm_media</span>
        {{ __('Medios') }}
    </x-nav-link>
    @can('user.index')
        <x-nav-link href="{{ route('user.index') }}" :active="request()->routeIs('user.index')">
            <span class="material-icons-outlined h-6 w-auto mr-3">people</span>
            {{ __('Users') }}
        </x-nav-link>
    @endcan
    @can('role.index')
        <x-nav-link href="{{ route('role.index') }}" :active="request()->routeIs('role.index')">
            <span class="material-icons-outlined h-6 w-auto mr-3">admin_panel_settings</span>
            {{ __('Roles') }}
        </x-nav-link>
    @endcan
    @can('post.index')
        <x-nav-link href="{{ route('post.index') }}" :active="request()->routeIs('post.index')">
            <span class="material-icons-outlined h-6 w-auto mr-3">article</span>
            {{ __('Blogs') }}
        </x-nav-link>
    @endcan
    @can('resource.index')
        <x-nav-link href="{{ route('resource.index') }}" :active="request()->routeIs('resource.index')">
            <span class="material-icons-outlined h-6 w-auto mr-3">file_download</span>
            {{ __('Recursos') }}
        </x-nav-link>
    @endcan
    <x-nav-link href="{{ route('message.inbox') }}" :active="request()->routeIs('message.inbox')">
        <span class="material-icons-outlined h-6 w-auto mr-3">mail</span>
        {{ __('Mensajes') }}
    </x-nav-link>
</nav>

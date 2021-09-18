<nav class="mt-10">
    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        <span class="material-icons-outlined h-6 w-auto mr-3">dashboard</span>
        {{ __('Dashboard') }}
    </x-nav-link>
    @can('user.index')
        <x-nav-link href="{{ route('user.index') }}" :active="request()->routeIs('user.index')">
            <span class="material-icons-outlined h-6 w-auto mr-3">people</span>
            {{ __('Users') }}
        </x-nav-link>
    @endcan
    @can('post.index')
        <x-nav-link href="{{ route('post.index') }}" :active="request()->routeIs('post.index')">
            <span class="material-icons-outlined h-6 w-auto mr-3">article</span>
            {{ __('Blogs') }}
        </x-nav-link>
    @endcan
    @can('role.index')
        <x-nav-link href="{{ route('role.index') }}" :active="request()->routeIs('role.index')">
            <span class="material-icons-outlined h-6 w-auto mr-3">admin_panel_settings</span>
            {{ __('Roles') }}
        </x-nav-link>
    @endcan
</nav>

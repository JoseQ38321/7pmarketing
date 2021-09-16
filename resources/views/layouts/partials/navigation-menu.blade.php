<nav class="mt-10">
    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        <x-tabler-dashboard class="h-6 w-auto mr-3"/>
        {{ __('Dashboard') }}
    </x-nav-link>
    @can('user.index')
        <x-nav-link href="{{ route('user.index') }}" :active="request()->routeIs('user.index')">
            <x-phosphor-users class="h-6 w-auto mr-3"/>
            {{ __('Users') }}
        </x-nav-link>
    @endcan
    @can('post.index')
        <x-nav-link href="{{ route('post.index') }}" :active="request()->routeIs('post.index')">
            <x-sui-postcard class="h-6 w-auto mr-3"/>
            {{ __('Blogs') }}
        </x-nav-link>
    @endcan
</nav>

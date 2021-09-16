<div x-show="dropdownOpen"
    class="absolute right-0 mt-8 md:mt-4 w-48 bg-white rounded-md overflow-hidden shadow-xl border border-gray-50 z-10"
    style="display: none;">
    <a href="{{ route('welcome') }}"
        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">{{ __('Go Home') }}</a>
    <a href="{{ route('profile.show') }}"
        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">{{ __('Profile') }}</a>
    <a href="{{ route('api-tokens.index') }}"
        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">{{ __('API Tokens') }}</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                        this.closest('form').submit();">
            {{ __('Log Out') }}
        </button>
    </form>
</div>

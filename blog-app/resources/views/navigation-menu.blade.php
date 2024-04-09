{{-- navigation --}}
<nav class="flex items-center justify-between py-3 px-6 border-b border-gray-100">
    <div id="navigation-left" class="flex items-center">
        <a href="{{ route('home') }}">
            <x-application-mark />
        </a>
        <div class="top-menu ml-10">
            <div class="flex space-x-4">
                <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-nav-link>
                <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                    {{ __('Blog') }}
                </x-nav-link>
            </div>
        </div>
    </div>
    <div id="navigation-right" class="flex items-center md:space-x-6">
        @auth
            {{-- User View --}}
            @include('layouts.essentials.header-auth')
        @else
            {{-- Guest View --}}
            @include('layouts.essentials.header-guest')
        @endauth
    </div>
</nav>

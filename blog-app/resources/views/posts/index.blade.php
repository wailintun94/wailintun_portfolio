<x-app-layout>

        <div class="md:col-span-3 col-span-4">
            <livewire:post-list />
            {{-- @livewire('post-list') //you can write like this too --}}
        </div>
        <div id="side-bar"
            class="border-none col-span-4 md:col-span-1 px-3 md:px-6 space-y-10 py-6 pt-10 h-screen sticky top-0">
            @include('posts.essentials.search-box')
            @include('posts.essentials.category-box')
        </div>
    </div>
</x-app-layout>

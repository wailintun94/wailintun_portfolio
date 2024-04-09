<div id="recommended-topics-box">
    <h3 class="text-lg font-semibold text-gray-900 mb-3">Recommended Topics</h3>
    <div class="topics flex flex-wrap justify-start gap-2">
        @foreach ($categories as $category)
            <x-badge wire:navigate href="{{ route('posts.index', ['category' => $category->slug]) }}" :text_color="$category->text_color" :bg_color="$category->bg">
                {{ $category->category }}
            </x-badge>
        @endforeach
    </div>
</div>

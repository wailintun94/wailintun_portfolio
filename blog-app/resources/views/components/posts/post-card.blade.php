@props(['post'])
<div {{ $attributes }}>
    <a wire:navigate href="{{ route('posts.show', $post->slug) }}">
        <div>
            <img class="object-contain h-64 w-96 rounded-xl" src="{{ $post->getThumbnailImage() }}">
        </div>
    </a>
    <div class="mt-3">
        <p class="text-gray-500 text-sm">{{ $post->published_at }}</p>
        <a wire:navigate href="{{ route('posts.show', $post->slug) }}" class="text-xl font-bold text-gray-900">{{ $post->title }}</a>
    </div>
    <div class="flex items-center my-2 gap-2">
        @if ($category = $post->categories()->first())
            @foreach ($post->categories as $category)
                <x-badge wire:navigate href="{{ route('posts.index', ['category' => $category->category]) }}"
                    :text_color="$category->text_color" :bg_color="$category->bg">
                    {{ $category->category }}
                </x-badge>
            @endforeach
        @endif
    </div>
</div>

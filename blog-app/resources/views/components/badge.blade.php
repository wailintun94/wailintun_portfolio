@props(['text_color', 'bg_color'])
@php
$text_color = match ($text_color) {
    'gray' => 'text-gray-800',
    'blue' => 'text-blue-800',
    'green' => 'text-green-800',
    'red' => 'text-red-800',
    'yellow' => 'text-yellow-800',
    'black' => 'text-black-800',
    'white' => 'text-white-800',
     default => 'text-black-800',
};
$bg_color = match ($bg_color) {
    'gray' => 'bg-gray-100',
    'blue' => 'bg-blue-100',
    'green' => 'bg-green-100',
    'red' => 'bg-red-100',
    'yellow' => 'bg-yellow-100',
    'black' => 'bg-black-100',
    'white' => 'bg-white-100',
     default => 'bg-red-100',
};
@endphp
<button {{ $attributes }} class="rounded-xl px-3 py-1 text-base {{ $text_color }} {{ $bg_color }}">
    {{ $slot }}
</button>

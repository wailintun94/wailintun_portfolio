@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-gray-200 focus:outline-none focus:border-none focus:ring-0 outline-none border-none rounded-md text-sm text-gray-900 placeholder:text-gray-400']) !!}>

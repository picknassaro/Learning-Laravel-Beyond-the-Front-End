@props(['routeName'])

@php
    $currentRoute = request()->route()->getName();
    $isActive = $currentRoute == $routeName;
@endphp

<a href="
        {{ route($routeName) }}"
    class="
        block md:inline rounded-md px-3 py-2 text-base md:text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white
        {{ $isActive ? 'bg-gray-900 text-white' : '' }}"
    aria-current="
        {{ $isActive ? 'page' : 'false' }}">
    {{ $slot }}
</a>

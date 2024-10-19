@props(['type', 'href', 'linkAppearance' => null])

@php
    $classes = 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded self-start h-13';
@endphp

@if ($type === 'submit')
    <button {{ $attributes->merge(['type' => 'submit', 'class' => $linkAppearance === null ?? $classes]) }}>
        {{ $slot }}
    </button>
@elseif ($type === 'link')
    <a {{ $attributes->merge(['href' => $href, 'class' => $classes]) }}>
        {{ $slot }}
    </a>
@endif

@php
    // This is a component just for buttons and links that need to look like buttons. This is not for links that need to look like links or buttons that need to look like links.
@endphp

@php
    $classes = 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded self-start h-13';
@endphp

@if ($type === 'submit')
    <button {{ $attributes->merge(['type' => 'submit', 'class' => $classes]) }}>
        {{ $slot }}
    </button>
@elseif ($type === 'link')
    <a {{ $attributes->merge(['href' => $href, 'class' => $classes]) }}>
        {{ $slot }}
    </a>
@endif

@if ($type === 'submit')
    <button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) }}>
        {{ $slot }}
    </button>
@elseif ($type === 'link')
    <a {{ $attributes->merge(['href' => $href, 'class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) }}>
        {{ $slot }}
    </a>
@endif

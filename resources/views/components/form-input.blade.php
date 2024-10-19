@props(['full' => 'false', 'type' => '', 'name' => '', 'outline' => 'false', 'resource' => null])

<input class="{{ $full === 'true' ? 'w-full' : '' }} {{ $outline === 'true' ? 'border-2 focus:border-none border-gray-400' : '' }} h-12 rounded px-4 py-2 focus:outline-blue-500"
       type="{{ $type }}"
       name="{{ $name }}"
       value="{{ old($name, $resource->$name ?? '') }}" />

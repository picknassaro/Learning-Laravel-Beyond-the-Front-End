@props(['full' => 'false', 'type' => '', 'name' => '', 'resource' => null])

<input class="{{ $full === 'true' ? 'w-full' : '' }} h-12 rounded px-4 py-2 focus:outline-blue-500"
       type="{{ $type }}"
       name="{{ $name }}"
       value="{{ old($name, $resource->$name ?? '') }}" />

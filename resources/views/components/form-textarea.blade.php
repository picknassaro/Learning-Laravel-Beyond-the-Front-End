@props(['full' => 'false', 'name' => '', 'resource' => null])

<div class="{{ $full === 'true' ? 'w-full' : '' }} rounded bg-white p-1 outline-blue-500 focus-within:outline">
    <textarea class="{{ $full === 'true' ? 'w-full' : '' }} h-48 rounded p-3 focus:outline-none"
              name="{{ $name }}">{{ old($name, $resource->$name ?? '') }}</textarea>
</div>

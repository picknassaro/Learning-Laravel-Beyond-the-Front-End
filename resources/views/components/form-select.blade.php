@props(['full' => 'false', 'name' => '', 'options' => [], 'resource' => null])

<select class="{{ $full === 'true' ? 'w-full' : '' }} h-12 rounded bg-white px-4 py-2 focus:outline-blue-500"
        name="{{ $name }}">
    @foreach ($options as $option)
        <option value="{{ $option }}"
                {{ old($name, $resource->$name ?? '') == $option ? 'selected' : '' }}>
            {{ $option }}
        </option>
    @endforeach
</select>

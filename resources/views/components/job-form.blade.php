@props(['job' => null, 'type' => ['post', 'patch']])

<form class="mb-4 flex flex-wrap"
      method="POST"
    action="{{ $type == 'post' ? route('showAllJobs') : ($job ? route('showSingleJob', ['job' => $job->id]) : '') }}">
    @csrf
    @if ($type == 'patch')
        @method('PATCH')
    @endif
    <div class="mb-4 w-full">
        <label class="mb-1 block w-full"
               for="title">
            Title
        </label>
        <input class="h-12 w-full rounded px-4 py-2 focus:outline-blue-500"
               type="text"
               name="title"
               value="{{ old('title', $job->title ?? '') }}" />
    </div>
    <div class="mb-4 w-full">
        <label class="mb-1 block w-full"
               for="description">Description</label>
        <div class="rounded bg-white p-1 outline-blue-500 focus-within:outline">
            <textarea class="h-48 w-full rounded p-3 focus:outline-none"
                      name="description">{{ old('description', $job->description ?? '') }}</textarea>
        </div>
    </div>
    <div class="mb-4 flex w-full">
        <div class="mr-4 flex grow flex-col">
            <label class="mb-1 block"
                   for="location">Location</label>
            <input class="h-12 rounded px-4 py-2 focus:outline-blue-500"
                   type="text"
                   name="location"
                   value="{{ old('location', $job->location ?? '') }}" />
        </div>
        <div class="mr-4 flex grow flex-col">
            <label class="mb-1 block"
                   for="type">Type</label>
            <select class="h-12 rounded bg-white px-4 py-2 focus:outline-blue-500"
                    name="type">
                <option value="Full-time"
                        {{ old('type', $job->type ?? '') == 'Full-time' ? 'selected' : '' }}>Full Time
                </option>
                <option value="Part-time"
                        {{ old('type', $job->type ?? '') == 'Part-time' ? 'selected' : '' }}>Part Time
                </option>
            </select>
        </div>
        <div class="flex grow flex-col">
            <label class="mb-1 block"
                   for="salary">Salary</label>
            <input class="h-12 rounded px-4 py-2 focus:outline-blue-500"
                   type="text"
                   name="salary"
                   value="{{ old('salary', $job->salary ?? '') }}" />
        </div>
    </div>
    <div class="flex justify-between">
        <x-primary-button type="submit"
                          class="mr-4">Submit</x-primary-button>
        @if ($type == 'patch' && $job)
            <a href="{{ route('showSingleJob', ['job' => $job->id]) }}"
               class="mr-4 self-start px-4 py-2 font-bold text-black">Cancel</a>
            <button type="submit"
                    class="mr-4 font-bold text-red-500"
                    form="delete">Delete</button>
        @endif
    </div>
</form>
@if ($type == 'patch')
    @if ($job)
        <form class="mb-4"
              method="POST"
              action="{{ route('showSingleJob', ['job' => $job->id]) }}"
              id="delete"
              hidden>
    @endif
    @csrf
    @method('DELETE')
    </form>
@endif
@if ($errors->any())
    <div class="text-red-500">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-sm">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

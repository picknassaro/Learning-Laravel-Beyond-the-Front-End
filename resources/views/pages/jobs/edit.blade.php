@extends('layouts.default')

@section('title', 'Post a New Job')

@section('page-header')
    <x-page-header>Edit Job: {{ $job->title }}</x-page-header>
@endsection

@section('content')
    <form class="flex flex-wrap mb-4" method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PATCH')
        <div class="w-full mb-4">
            <label class="w-full block mb-1" for="title">Title</label>
            <input class="py-2 px-4 rounded w-full h-12 focus:outline-blue-500" type="text" name="title"
                placeholder="{{ $job->title }}" />
        </div>
        <div class="w-full mb-4">
            <label class="w-full block mb-1" for="description">Description</label>
            <div class="rounded bg-white p-1 focus-within:outline outline-blue-500">
                <textarea class="w-full rounded h-48 p-3 focus:outline-none" name="description" placeholder="{{ $job->description }}"></textarea>
            </div>
        </div>
        <div class="w-full flex mb-4">
            <div class="grow flex flex-col mr-4">
                <label class="block mb-1" for="location">Location</label>
                <input class="py-2 px-4 rounded h-12 focus:outline-blue-500" type="text" name="location"
                    placeholder="{{ $job->location }}" />
            </div>
            <div class="grow flex flex-col mr-4">
                <label class="block mb-1" for="type">Type</label>
                <select class="py-2 px-4 rounded h-12 focus:outline-blue-500 bg-white" name="type"
                    placeholder="{{ $job->type }}">
                    <option value="Full-time">Full Time</option>
                    <option value="Part-time">Part Time</option>
                </select>
            </div>
            <div class="grow flex flex-col">
                <label class="block mb-1" for="salary">Salary</label>
                <input class="py-2 px-4 rounded h-12 focus:outline-blue-500" type="text" name="salary"
                    placeholder="{{ $job->salary }}" />
            </div>
        </div>
        <div class="flex justify-between">
            <x-primary-button type="submit" class="mr-4">Submit</x-primary-button>
            <a href="/jobs/{{ $job->id }}" class="text-black font-bold py-2 px-4 self-start mr-4">Cancel</a>
            <button type="submit" class="text-red-500 font-bold mr-4" form="delete">Delete</button>
        </div>
    </form>
    <form class="mb-4" method="POST" action="/jobs/{{ $job->id }}" id="delete" hidden>
        @csrf
        @method('DELETE')
    </form>
    @if ($errors->any())
        <div class="text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

@extends('layouts.default')

@section('title', 'Post a New Job')

@section('page-header', 'Post a New Job')

@section('content')
    <form class="flex flex-wrap" method="POST" action="/jobs">
        @csrf
        <div class="w-full mb-4">
            <label class="w-full block mb-1" for="title">Title</label>
            <input class="rounded-xl w-full h-12 p-4 focus:outline-blue-500" type="text" name="title" placeholder="" />
        </div>
        <div class="w-full mb-4">
            <label class="w-full block mb-1" for="description">Description</label>
            <div class="rounded-xl bg-white p-1 focus-within:outline outline-blue-500">
                <textarea class="w-full rounded-xl h-48 p-3 focus:outline-none" name="description"></textarea>
            </div>
        </div>
        <div class="w-full flex mb-4">
            <div class="grow flex flex-col mr-4">
                <label class="block mb-1" for="location">Location</label>
                <input class="rounded-xl h-12 p-4 focus:outline-blue-500" type="text" name="location" placeholder="" />
            </div>
            <div class="grow flex flex-col mr-4">
                <label class="block mb-1" for="type">Type</label>
                <select class="rounded-xl h-12 p-4 focus:outline-blue-500 bg-white" name="type" placeholder="">
                    <option value="full-time">Full Time</option>
                    <option value="part-time">Part Time</option>
                </select>
            </div>
            <div class="grow flex flex-col">
                <label class="block mb-1" for="salary">Salary</label>
                <input class="rounded-xl h-12 p-4 focus:outline-blue-500" type="text" name="salary" placeholder="" />
            </div>
        </div>
        <button class="rounded-xl p-4 bg-blue-500 text-white">Post Job</button>
    </form>
@endsection

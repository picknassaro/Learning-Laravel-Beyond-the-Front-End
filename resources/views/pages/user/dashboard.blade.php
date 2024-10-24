@props(['user', 'employer', 'jobs'])

@extends('layouts.default')

@section('title', 'Dashboard')

@section('page-header')
    <div class="flex justify-between">
        <x-page-header>Dashboard</x-page-header>
        @auth
            <x-primary-button type="link"
                              href="{{ route('createJob') }}">Post a Job</x-primary-button>
        @endauth
    </div>
@endsection

@section('content')
    <h2 class="mb-4 text-3xl font-semibold">Your recent job postings:</h2>
    <div class="grid grid-cols-1 gap-8 pb-8 md:grid-cols-2 xl:grid-cols-3">
        <div class="xl:col-span-2 xl:grid-cols-2">
            <ul class="grid grid-cols-1 gap-8 pb-8 xl:grid-cols-2">
                @foreach ($jobs as $job)
                    <x-job-card :job="$job" />
                @endforeach
            </ul>
            <div class="mt-4 grid grid-cols-2">
                <div class="flex justify-start">
                    @if ($jobs->previousPageUrl())
                        <x-primary-button type="buttonLink"
                                          href="{{ $jobs->previousPageUrl() }}">Previous</x-primary-button>
                    @endif
                </div>
                <div class="flex justify-end">
                    @if ($jobs->nextPageUrl())
                        <x-primary-button type="buttonLink"
                                          href="{{ $jobs->nextPageUrl() }}">Next</x-primary-button>
                    @endif
                </div>
            </div>
        </div>
        <div><h3 class="mb-4 text-xl font-medium">Update your profile:</h3></div>
    </div>
@endsection

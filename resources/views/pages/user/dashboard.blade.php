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
    <div class="max-w-screen-sm block mx-auto lg:max-w-none md:grid md:grid-cols-1 md:gap-8 md:pb-8 lg:grid-cols-2 xl:grid-cols-3">
        <div class="lg:border-r-2 lg:border-gray-800 lg:pr-8 xl:col-span-2 xl:grid-cols-2">
            <h2 class="mb-4 text-3xl font-semibold">Your recent job listings</h2>
            <ul class="grid grid-cols-1 gap-8 pb-8 xl:grid-cols-2">
                @foreach ($jobs as $job)
                    <x-job-card :job="$job" />
                @endforeach
            </ul>
            <div class="mb-4 grid grid-cols-2">
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
        <div class="pt-12 md:pt-8 lg:pt-0">
            <x-auth-form type="updateProfile"
                         :user="$user" />
            @if (session('success'))
                <div class="my-4 text-green-600">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
@endsection

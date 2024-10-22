@extends('layouts.default')

@section('title', 'Jobs')

@section('page-header')
    <div class="flex justify-between">
        <x-page-header>Jobs</x-page-header>
        @auth
            <x-primary-button type="link"
                              href="{{ route('createJob') }}">Post a Job</x-primary-button>
        @endauth
    </div>
@endsection

@section('content')
    <ul class="grid grid-cols-1 gap-8 pb-8 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($jobs as $job)
            <x-job-card :job="$job"
                        strLimit="250"
                        cardSize="normal" />
        @endforeach
    </ul>
    <div class="grid grid-cols-2">
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
@endsection

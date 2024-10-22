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
    <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-16">
        @foreach ($jobs as $job)
            <li class="">
                <strong>Title:</strong> <a href="{{ route('showSingleJob', ['job' => $job->id]) }}"
                   class="underline">{{ $job['title'] }}</a>
                <br />
                <strong>Company:</strong> {{ $job->employer->employer_name }}
                <br />
                <strong>Description:</strong> {{ $job['description'] }}
                <br />
                <strong>Location:</strong> {{ $job['location'] }}
                <br />
                <strong>Type:</strong> {{ $job['job_type'] }}
                <br />
                <strong>Salary:</strong> {{ $job['salary'] }}
            </li>
        @endforeach
    </ul>
    {{ $jobs->links() }}
@endsection

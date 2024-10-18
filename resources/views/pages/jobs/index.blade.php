@extends('layouts.default')

@section('title', 'Jobs')

@section('page-header')
    <div class="flex justify-between">
        <x-page-header>Jobs</x-page-header>
        <x-primary-button type="link" href="{{ route('createJob') }}">Post a Job</x-primary-button>
    </div>
@endsection

@section('content')
    <ul>
        @foreach ($jobs as $job)
            <li class="list-disc mb-4">
                <strong>Title:</strong> <a href="{{ route('showSingleJob', ['job' => $job->id]) }}" class="underline">{{ $job['title'] }}</a>
                <br />
                <strong>Company:</strong> {{ $job->employer->name }}
                <br />
                <strong>Description:</strong> {{ $job['description'] }}
                <br />
                <strong>Location:</strong> {{ $job['location'] }}
                <br />
                <strong>Type:</strong> {{ $job['type'] }}
                <br />
                <strong>Salary:</strong> {{ $job['salary'] }}
            </li>
        @endforeach
    </ul>
    {{ $jobs->links() }}
@endsection

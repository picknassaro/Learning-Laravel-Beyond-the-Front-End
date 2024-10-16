@extends('layouts.default')

@section('title', 'Jobs')

@section('page-header', 'Jobs')

@section('content')
    <h2 class="mb-4">Available Jobs:</h2>
    <ul>
        @foreach ($jobs as $job)
            <li class="list-disc mb-4">
                <strong>Title:</strong> <a href="jobs/{{ $job['id'] }}" class="underline">{{ $job['title'] }}</a>
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

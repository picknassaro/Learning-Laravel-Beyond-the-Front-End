@extends('layouts.default')

@section('title', 'Jobs')

@section('page-header', 'Jobs')

@section('content')
    <div class="flex justify-between">
        <h2 class="mb-4">Available Jobs:</h2>
        <a href="jobs/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Post a Job</a>
    </div>
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

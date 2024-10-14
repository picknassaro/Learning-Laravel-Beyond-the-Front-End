@extends('layouts.default')

@section('title', 'Home')

@section('page-header', 'Home')

@section('content')
    <h1 class="mb-4">Available Jobs:</h1>
    <ul>
        @foreach ($jobs as $job)
            <li class="list-disc mb-4">
                <strong>Title:</strong> {{ $job['title'] }}
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
@endsection

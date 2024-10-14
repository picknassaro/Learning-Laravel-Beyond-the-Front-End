@extends('layouts.default')

@section('title', 'Home')

@section('page-header', 'Home')

@section('content')
    <h1 class="mb-4 font-bold text-lg">{{ $job['title'] }}</h1>
    <ul>
        <li class="mb-4">
            <strong>Description:</strong> {{ $job['description'] }}
            <br />
            <strong>Location:</strong> {{ $job['location'] }}
            <br />
            <strong>Type:</strong> {{ $job['type'] }}
            <br />
            <strong>Salary:</strong> {{ $job['salary'] }}
        </li>
    </ul>
@endsection

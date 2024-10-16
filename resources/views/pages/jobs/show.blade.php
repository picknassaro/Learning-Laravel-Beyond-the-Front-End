@extends('layouts.default')

@php
    $jobTitle = $job['title'];
    $employer = $job->employer->name;
    $pageTitle = $jobTitle . ' at ' . $employer;
@endphp
@section('title', $pageTitle)

@section('page-header', $jobTitle)

@section('content')
    <h2 class="mb-4 font-bold text-lg"></h2>
    <ul>
        <li class="mb-4">
            <strong>Company:</strong> {{ $employer }}
            <br />
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

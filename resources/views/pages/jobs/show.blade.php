@extends('layouts.default')

@php
    $jobTitle = $job['title'];
    $employer = $job->employer->name;
    $pageTitle = $jobTitle . ' at ' . $employer;
@endphp
@section('title', $pageTitle)

@section('page-header')
    <div class="flex justify-between">
        <x-page-header>{{ $jobTitle }}</x-page-header>
        @if ($job->employer->user->is(Auth::user()))
            <x-primary-button type="link"
                              href="{{ route('editJob', ['job' => $job->id]) }}">Edit Job</x-primary-button>
        @endif
    </div>
@endsection

@section('content')
    <ul>
        <li class="mb-4">
            <strong>Company:</strong> {{ $employer }}
            <br />
            <strong>Description:</strong> {{ $job['description'] }}
            <br />
            <strong>Location:</strong> {{ $job['location'] }}
            <br />
            <strong>Type:</strong> {{ $job['job_type'] }}
            <br />
            <strong>Salary:</strong> {{ $job['salary'] }}
        </li>
    </ul>
@endsection

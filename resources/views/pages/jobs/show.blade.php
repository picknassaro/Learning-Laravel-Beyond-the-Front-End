@props(['job', 'relatedJobs' => []])

@extends('layouts.default')

@php
    $jobTitle = $job['title'];
    $employer = $job->employer->employer_name;
    $pageTitle = $jobTitle . ' at ' . $employer;
@endphp
@section('title', $pageTitle)

@section('page-header')
    <div class="flex justify-between">
        <x-page-header>{{ $jobTitle }}</x-page-header>
        @if (Auth::check() && (Auth::user()->can('edit-job', $job) || Auth::user()->can('is-admin', $job)))
            <x-primary-button type="link"
                              href="{{ route('editJob', ['job' => $job->id]) }}">Edit Job</x-primary-button>
        @endif
    </div>
@endsection

@php
    $jobHasApplicants = isset($job->users) && $job->users->isNotEmpty();
@endphp

@section('content')
    <div class="mb-8 md:flex md:flex-wrap md:justify-center xl:grid xl:grid-cols-[48rem_1fr] xl:gap-8">
        <div class="mb-8 flex justify-center xl:mb-0">
            <x-job-card :job="$job"
                        cardSize="normal"
                        strLimit="null" />
        </div>
        <div class="md:block md:max-w-5xl">
            <h2 class="mb-4 text-xl font-semibold">Other Jobs from the same Employer</h2>
            <div class="grid grid-cols-1 grid-rows-3 gap-8 md:grid-cols-2 md:grid-rows-2 xl:grid-cols-1 xl:grid-rows-3">
                @foreach ($relatedJobs as $relatedJob)
                    <x-job-card :job="$relatedJob"
                                cardSize="mini" />
                @endforeach
            </div>
        </div>
    </div>
@endsection

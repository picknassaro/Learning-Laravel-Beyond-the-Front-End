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
        @can('edit-job', $job)
            <x-primary-button type="link"
                              href="{{ route('editJob', ['job' => $job->id]) }}">Edit Job</x-primary-button>
        @endcan
    </div>
@endsection

@section('content')
    <div class="md:flex md:justify-center md:flex-wrap xl:grid xl:grid-cols-[48rem_1fr] xl:gap-8">
        <div class="flex justify-center mb-8 2xl:mb-0">
            <x-job-card :job="$job"
                        cardSize="normal" />
        </div>
        <div class="md:hidden">
            <h2 class="mb-4 text-xl font-semibold">Other Jobs from the same Employer</h2>
            <div class="grid grid-rows-3 gap-8">
                @foreach ($relatedJobs as $relatedJob)
                    <x-job-card :job="$relatedJob"
                                strLimit="250"
                                cardSize="mini" />
                @endforeach
            </div>
        </div>
        <div class="hidden md:block md:max-w-5xl">
            <h2 class="mb-4 text-xl font-semibold">Other Jobs from the same Employer</h2>
            <div class="grid grid-cols-2 grid-rows-2 gap-8 xl:grid xl:grid-cols-1 xl:grid-rows-3">
                @foreach ($relatedJobs as $relatedJob)
                    <x-job-card :job="$relatedJob"
                                strLimit="250"
                                cardSize="mini" />
                @endforeach
            </div>
        </div>
    </div>
@endsection

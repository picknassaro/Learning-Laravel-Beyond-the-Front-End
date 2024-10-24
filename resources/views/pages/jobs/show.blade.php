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

@section('content')
    <div class="mb-8 md:flex md:flex-wrap md:justify-center xl:grid xl:grid-cols-[48rem_1fr] xl:gap-8">
        <div class="mb-8 flex justify-center 2xl:mb-0">
            <x-job-card :job="$job"
                        cardSize="normal"
                        strLimit="null" />
        </div>
        <div class="md:hidden">
            <h2 class="mb-4 text-xl font-semibold">Other Jobs from the same Employer</h2>
            <div class="grid grid-rows-3 gap-8">
                @foreach ($relatedJobs as $relatedJob)
                    <x-job-card :job="$relatedJob"
                                cardSize="mini" />
                @endforeach
            </div>
        </div>
        <div class="hidden md:block md:max-w-5xl">
            <h2 class="mb-4 text-xl font-semibold">Other Jobs from the same Employer</h2>
            <div class="grid grid-cols-2 grid-rows-2 gap-8 xl:grid xl:grid-cols-1 xl:grid-rows-3">
                @foreach ($relatedJobs as $relatedJob)
                    <x-job-card :job="$relatedJob"
                                cardSize="mini" />
                @endforeach
            </div>
        </div>
    </div>
    <div>
        @if ($job->users->isNotEmpty())
        <h2 class="mb-4 text-xl font-semibold">Latest applicants:</h2>
            @foreach ($job->users as $user)
                <span class="mb-4">{{ $user->first_name[0] . '. ' . $user->last_name }}{{ !$loop->last ? ', ' : '' }}</span>
            @endforeach
        @endif
    </div>
@endsection

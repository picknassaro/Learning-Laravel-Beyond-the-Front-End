@extends('layouts.default')

@section('title', 'Post a New Job')

@section('page-header')
    <x-page-header>Edit Job: {{ $job->title }}</x-page-header>
@endsection

@section('content')
    <x-job-form type="patch"
                :job="$job" />
@endsection

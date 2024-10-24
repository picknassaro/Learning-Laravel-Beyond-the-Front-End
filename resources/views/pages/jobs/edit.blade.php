@extends('layouts.default')

@section('title', 'Edit Job')

@section('page-header')
    <x-page-header>Edit Job: {{ $job->title }}</x-page-header>
@endsection

@section('content')
    <x-job-form type="edit"
                :job="$job" />
@endsection

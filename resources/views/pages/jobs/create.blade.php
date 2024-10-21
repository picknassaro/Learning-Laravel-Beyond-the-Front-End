@extends('layouts.default')

@section('title', 'Post a New Job')

@section('page-header')
    <x-page-header>Post a New Job</x-page-header>
@endsection

@section('content')
    <x-job-form type="create" />
@endsection

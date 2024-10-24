@props(['user'])

@extends('layouts.default')

@section('title', 'Dashboard')

@section('page-header')
    <div class="flex justify-between">
        <x-page-header>Dashboard</x-page-header>
        @auth
            <x-primary-button type="link"
                              href="{{ route('createJob') }}">Post a Job</x-primary-button>
        @endauth
    </div>
@endsection

@section('content')
    <h1 class="mb-4 text-3xl font-semibold">Hello {{ $user->first_name }} {{ $user->last_name }}!</h1>
    <h2 class="mb-4 text-3xl font-semibold">Your recent job postings:</h2>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        @dump($user->employer->id)
    </div>
@endsection

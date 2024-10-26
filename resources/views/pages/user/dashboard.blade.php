@props(['user', 'employer', 'jobs'])

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
    <div class="max-w-screen-sm block mx-auto md:grid md:grid-cols-1 md:gap-8 md:pb-8">
        <div class="pt-12 md:pt-8 lg:pt-0">
            <x-auth-form type="updateProfile"
                         :user="$user" />
            @if (session('success'))
                <div class="my-4 text-green-600">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
@endsection

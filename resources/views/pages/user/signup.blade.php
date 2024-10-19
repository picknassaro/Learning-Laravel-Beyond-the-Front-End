@extends('layouts.default')

@section('title', 'Sign up')

@section('content')
    <form class="box-content w-96 rounded-2xl bg-white px-32 py-16"
          action="{{ route('storeUser') }}"
          method="POST">
        <h1 class="mb-8 text-center text-3xl font-bold tracking-tight text-gray-900">Sign Up</h1>
        <div class="mb-4 block">
            <x-form-label for="first_name">First Name</x-form-label>
            <x-form-input full="true"
                          type="text"
                          name="first_name"
                          id="first_name"
                          outline="true" />
        </div>
        <div class="mb-4 block">
            <x-form-label for="last_name">Last Name</x-form-label>
            <x-form-input full="true"
                          type="text"
                          name="last_name"
                          id="last_name"
                          outline="true" />
        </div>
        <div class="mb-4 block">
            <x-form-label for="email">Email</x-form-label>
            <x-form-input full="true"
                          type="email"
                          name="email"
                          id="email"
                          outline="true" />
        </div>
        <div class="mb-4 block">
            <x-form-label for="password">Password</x-form-label>
            <x-form-input full="true"
                          type="password"
                          name="password"
                          id="password"
                          outline="true" />
        </div>
        <x-primary-button type="submit" class="mb-2">Sign Up</x-primary-button>
        <p class="mb-2">Or</p>
        <a href="{{ route('signup') }}"
           class="underline">Log in</a>
    </form>
@endsection

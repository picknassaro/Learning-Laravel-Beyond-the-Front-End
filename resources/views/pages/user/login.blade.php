@extends('layouts.default')

@section('title', 'Log in')

@section('content')
    <form class="box-content w-96 rounded-2xl bg-white px-32 py-16"
          action={{ route('storeSession') }}
          method="POST">
        @csrf
        <h1 class="mb-8 text-center text-3xl font-bold tracking-tight text-gray-900">Log In</h1>
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
        <x-primary-button type="submit"
                          class="mb-2">Log In</x-primary-button>
        <p class="mb-2">Or</p>
        <a href="{{ route('signup') }}"
           class="underline">Sign up</a>
    </form>
@endsection

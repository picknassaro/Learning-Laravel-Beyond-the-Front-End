@extends('layouts.default')

@section('title', 'Sign up')

@section('content')
    <form class="box-content w-96 rounded-2xl bg-white p-4 md:px-16 md:py-8"
          action="{{ route('storeUser') }}"
          method="POST">
        @csrf
        <h1 class="mb-8 text-center text-3xl font-bold tracking-tight text-gray-900">Sign Up</h1>
        <div class="md:flex">
            <div class="mb-4 md:mr-4">
                <x-form-label for="first_name">First Name</x-form-label>
                <x-form-input full="true"
                              type="text"
                              name="first_name"
                              id="first_name"
                              outline="true" />
            </div>
            <div class="mb-4">
                <x-form-label for="last_name">Last Name</x-form-label>
                <x-form-input full="true"
                              type="text"
                              name="last_name"
                              id="last_name"
                              outline="true" />
            </div>
        </div>
        <div class="mb-4 block">
            <x-form-label for="employer_name">Company Name (optional)</x-form-label>
            <x-form-input full="true"
                          type="text"
                          name="employer_name"
                          id="employer_name"
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
        <div class="mb-4 block">
            <x-form-label for="password">Confirm Password</x-form-label>
            <x-form-input full="true"
                          type="password"
                          name="password_confirmation"
                          id="password_confirmation"
                          outline="true" />
        </div>
        <x-primary-button type="submit"
                          class="mb-2">Sign Up</x-primary-button>
        <p class="mb-2">Or</p>
        <a href="{{ route('signup') }}"
           class="underline mb-2 inline-block">Log in</a>
        @if ($errors->any())
            <div class="text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>

@endsection

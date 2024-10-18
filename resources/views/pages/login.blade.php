@extends('layouts.default')

@section('title', 'Log in')

@section('page-header')
    <x-page-header>Log in</x-page-header>
@endsection

@section('content')
    <form class="w-96"
          action="">
        <div class="mb-4 block">
            <x-form-label for="email">Email</x-form-label>
            <x-form-input full="true"
                          type="email"
                          name="email"
                          id="email" />
        </div>
        <div class="mb-4 block">
            <x-form-label for="password">Password</x-form-label>
            <x-form-input full="true"
                          type="password"
                          name="password"
                          id="password" />
        </div>
    </form>
@endsection

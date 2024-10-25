@extends('layouts.default')

@section('title', 'Sign up')

@vite('resources/css/auth-form.css')

@section('content')
    <x-auth-form type="signup" />
@endsection

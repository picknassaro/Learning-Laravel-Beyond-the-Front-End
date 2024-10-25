@extends('layouts.default')

@section('title', 'Log in')

@vite('resources/css/auth-form.css')

@section('content')
    <x-auth-form type="login" />
@endsection

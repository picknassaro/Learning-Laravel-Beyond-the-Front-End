@extends('layouts.default')

@section('title', 'Home')

@section('page-header', 'Home')

@section('content')
    <h1>{{ $greeting }} {{ $name }}!</h1>
@endsection

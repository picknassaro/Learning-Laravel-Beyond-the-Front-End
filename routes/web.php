<?php

use Illuminate\Support\Facades\Route;

// Return a view
Route::get('/', function () {
    return view('home');
});

Route::get('/contact', function () {
    return view('contact');
});

// Return a string
Route::get('/about', function () {
    return "About Page";
});

// API example
Route::get('/api', function () {
    return ["foo" => "bar"];
});

// Redirect to another route
Route::get('/home', function () {
    return redirect('/');
});

// Give a route a name
Route::get('/login', function () {
    return "Login page";
})->name('login');

// Redirect to a named route
Route::get('/dashboard', function () {
    return redirect()->route('login');
});

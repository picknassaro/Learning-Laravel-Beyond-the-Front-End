<?php

use Illuminate\Support\Facades\Route;

// Return a view
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// API example
Route::get('/api', function () {
    return ["foo" => "bar"];
})->name('api');

// Redirect to another url
// Don't rename this route, we would never invoke it from another route
Route::get('/home', function () {
    return redirect('/');
});

// All routes that need to be named are named now, naming demo routes from earlier have been removed

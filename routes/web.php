<?php

use Illuminate\Support\Facades\Route;

// Return a view
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/jobs', function () {
    return view('jobs', [
        // Pass data to view from route
        'jobs' => [
            [
                'title' => 'Web Developer',
                'description' => 'We are looking for a web developer',
                'location' => 'Remote',
                'type' => 'Full-time',
                'salary' => '$150,000.00 per year'
            ],
            [
                'title' => 'Copywriter',
                'description' => 'We are looking for a copywriter',
                'location' => 'Remote',
                'type' => 'Full-time',
                'salary' => '$150,000.00 per year'
            ]
        ]
    ]);
})->name('jobs');

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

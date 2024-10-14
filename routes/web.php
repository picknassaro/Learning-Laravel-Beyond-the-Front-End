<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Job;

// Return a view
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/jobs', function () {
    return view('jobs', [
        // Pass data to view from route
        'jobs' => Job::all()
    ]);
})->name('jobs');

Route::get('job/{id}', function ($id) {
    // Arr::first is a helper function that returns the first element in an array that passes a given truth test
    // Pass in $jobs, defined above
    // Create a new anonymous function that takes a single entity from the $jobs array as $job
    // Use an arrow function to return the first job that has an id that matches the id passed in the route
    $job = Arr::first(Job::all(), fn($job) => $job['id'] == $id);

    // Return the job view with the $job variable passed in as data called 'job'
    return view('job', ['job' => $job]);
})->name('job');

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

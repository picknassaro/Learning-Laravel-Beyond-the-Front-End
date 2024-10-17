<?php

use Illuminate\Support\Facades\Route;
use App\Models\JobListing;



// Home routes
Route::get('/', function () {
    return view('/pages/home');
})->name('home');

Route::get('/home', function () {
    return redirect('/');
});



// Contact routes
Route::get('/contact', function () {
    return view('/pages/contact');
})->name('contact');



// Job routes
// Show all
// with('employer') is not for allowing us to show the employers. That will work regardless. It is an eager loading method that prevent an N+1 query problem. It will load all the employers in one query instead of loading them one by one.
Route::get('/jobs', function () {
    $jobs = JobListing::with('employer')->latest()->simplePaginate(10);
    return view('/pages/jobs/index', [
        'jobs' => $jobs
    ]);
})->name('showAllJobs');

// Post a Job
Route::get('/jobs/create', function () {
    return view('/pages/jobs/create');
})->name('createJob');

// View single Job
Route::get('/jobs/{id}', function ($id) {
    $job = JobListing::find($id);
    return view('/pages/jobs/show', ['job' => $job]);
})->name('showSingleJob');

// Edit single Job
Route::get('/jobs/{id}/edit', function ($id) {
    $job = JobListing::find($id);
    return view('/pages/jobs/edit');
})->name('editJob');

// Store a Job
Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required'],
        'description' => ['required'],
        'location' => ['required'],
        'type' => ['required'],
        'salary' => ['required', 'regex:/^\$((\d{1,3})(,\d{3})*|\d+)(\.\d{2})?$/']
    ]);
    JobListing::create([
        'title' => request('title'),
        'description' => request('description'),
        'location' => request('location'),
        'type' => request('type'),
        'salary' => preg_match('/\.\d{2}$/', request('salary')) ? request('salary') : request('salary') . '.00',
        'employer_id' => rand(1, 100) // Randomizing because we don't have a employer auth system yet
    ]);
    return redirect()->route('showAllJobs');
})->name('storeJob');



// API stuff
Route::get('/api', function () {
    return ["foo" => "bar"];
})->name('api');

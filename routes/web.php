<?php

use Illuminate\Support\Facades\Route;
use App\Models\JobListing;

Route::get('/', function () {
    return view('/pages/home');
})->name('home');

Route::get('/jobs', function () {
    $jobs = JobListing::with('employer')->latest()->simplePaginate(10);
    return view('/pages/jobs/index', [
        'jobs' => $jobs
    ]);
})->name('showAllJobs');

Route::get('/jobs/create', function () {
    return view('/pages/jobs/create');
})->name('createJob');

Route::get('/jobs/{id}', function ($id) {
    $job = JobListing::with('employer')->find($id);
    return view('/pages/jobs/show', ['job' => $job]);
})->name('showSingleJob');

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
        'salary' => request('salary'),
        'employer_id' => rand(1, 100) // Randomizing because we don't have a employer auth system yet
    ]);
    return redirect()->route('showAllJobs');
})->name('storeJob');

Route::get('/contact', function () {
    return view('/pages/contact');
})->name('contact');

Route::get('/api', function () {
    return ["foo" => "bar"];
})->name('api');

Route::get('/home', function () {
    return redirect('/');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Models\JobListing;

Route::get('/', function () {
    return view('pages/home');
})->name('home');

Route::get('/jobs', function () {
    $jobs = JobListing::with('employer')->simplePaginate(10);
    return view('pages/jobs/index', [
        'jobs' => $jobs
    ]);
})->name('showAllJobs');

Route::get('/jobs/create', function () {
    return view('pages/jobs/create');
})->name('createJob');

Route::get('jobs/{id}', function ($id) {
    $job = JobListing::with('employer')->find($id);
    return view('pages/jobs/show', ['job' => $job]);
})->name('showSingleJob');

Route::get('/contact', function () {
    return view('pages/contact');
})->name('contact');

Route::get('/api', function () {
    return ["foo" => "bar"];
})->name('api');

Route::get('/home', function () {
    return redirect('/');
});

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
})->name('jobs');

Route::get('/jobs/create', function () {
})->name('createJob');

Route::get('job/{id}', function ($id) {
    $job = JobListing::with('employer')->find($id);
    return view('pages/jobs/job', ['job' => $job]);
})->name('job');

Route::get('/contact', function () {
    return view('pages/contact');
})->name('contact');

Route::get('/api', function () {
    return ["foo" => "bar"];
})->name('api');

Route::get('/home', function () {
    return redirect('/');
});

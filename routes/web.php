<?php

use Illuminate\Support\Facades\Route;
use App\Models\JobListing;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/jobs', function () {
    $jobs = JobListing::with('employer')->get();

    return view('jobs', [
        'jobs' => $jobs
    ]);
})->name('jobs');

Route::get('job/{id}', function ($id) {
    $job = JobListing::find($id);

    return view('job', ['job' => $job]);
})->name('job');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/api', function () {
    return ["foo" => "bar"];
})->name('api');

Route::get('/home', function () {
    return redirect('/');
});

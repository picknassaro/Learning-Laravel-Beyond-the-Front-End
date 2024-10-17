<?php

use App\Http\Controllers\JobListingController;
use Illuminate\Support\Facades\Route;



// Home routes
Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/home', function () {
    return redirect()->route('home');
});



// Contact routes
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');



// Job Listing routes
Route::resource(
    "jobs",
    JobListingController::class
    // if we don't need all seven routes, we can do the following:
    // 'only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']
    // or we can do the opposite:
    // 'except' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']
)->names([
            'index' => 'showAllJobs',
            'create' => 'createJob',
            'store' => 'storeJob',
            'show' => 'showJob',
            'edit' => 'editJob',
            'update' => 'updateJob',
            'destroy' => 'destroyJob'
        ]);



// API stuff
Route::get('/api', function () {
    return ["foo" => "bar"];
})->name('api');

<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

// Return a view
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/jobs', function () {
    return view('jobs', [
        // Invoke the all method of the Job model to retrieve all jobs
        'jobs' => Job::all()
    ]);
})->name('jobs');

Route::get('job/{id}', function ($id) {
    // Create a variable equal to the result of the find method of the Job model with an argument of $id
    $job = Job::find($id);

    // Return the job view with the job variable passed in as an argument. Note that 'job' is the key and $job is the value. The key will be retrieved in the view as a variable, so if you pass in ['foo' => $job], you would retrieve the job variable in the view as $foo.
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

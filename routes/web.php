<?php

use Illuminate\Support\Facades\Route;
use App\Models\JobListing;



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
// Show all Job Listings
Route::get('/jobs', function () {
    $jobs = JobListing::with('employer')->latest()->simplePaginate(10);
    return view('pages.jobs.index', [
        'jobs' => $jobs
    ]);
})->name('showAllJobs');

// ↑↑ with('employer') is not for allowing us to show the employers. That will work regardless. It is an eager loading method that prevent an N+1 query problem. It will load all the employers in one query instead of loading them one by one.

// Load the page where we fill out a form to post a Job Listing
Route::get('/jobs/create', function () {
    return view('pages.jobs.create');
})->name('createJob');

// View a Single Listing
Route::get('/jobs/{job}', function (JobListing $job) {
    return view('pages.jobs.show', ['job' => $job]);
})->name('showSingleJob');

/* ↑↑
get('/jobs/{job}') is a route model bindig. function (JobListing $job) is a type hinting that tells Laravel to fetch the JobListing model with the id of {job} and pass it to the closure. If the url is /jobs/1, Laravel will get a result from the JobListing model where the id is 1 and pass it to the closure as $job.
['job' => $job] inside the view() method is an array that passes the $job variable to the view.
*/

// View the form where we can edit or delete a Job Listing
Route::get('/jobs/{job}/edit', function (JobListing $job) {
    return view('pages.jobs.edit', ['job' => $job]);
})->name('editJob');

// take what was entered into the form on the createJob page and store it in the database
Route::post('/jobs', function (JobListing $job) {
    request()->validate([
        'title' => ['required'],
        'description' => ['required'],
        'location' => ['required'],
        'type' => ['required'],
        'salary' => ['required', 'regex:/^\$((\d{1,3})(,\d{3})*|\d+)(\.\d{2})?$/']
    ]);
    $job::create([
        'title' => request('title'),
        'description' => request('description'),
        'location' => request('location'),
        'type' => request('type'),
        'salary' => preg_match('/\.\d{2}$/', request('salary')) ? request('salary') : request('salary') . '.00',
        'employer_id' => rand(1, 100) // Randomizing because we don't have a employer auth system yet
    ]);
    return redirect()->route('showAllJobs');
})->name('storeJob');

// We go here when we click submit in the patching version of the Job Listing form
Route::patch('/jobs/{job}', function (JobListing $job) {
    request()->validate([
        'title' => ['required'],
        'description' => ['required'],
        'location' => ['required'],
        'type' => ['required'],
        'salary' => ['required', 'regex:/^\$((\d{1,3})(,\d{3})*|\d+)(\.\d{2})?$/']
    ]);
    $job->update([
        'title' => request('title'),
        'description' => request('description'),
        'location' => request('location'),
        'type' => request('type'),
        'salary' => preg_match('/\.\d{2}$/', request('salary')) ? request('salary') : request('salary') . '.00',
    ]);
    return redirect()->route('showSingleJob', ['job' => $job->id]);
})->name('editSingleJob');

// We go here when we click delete in the patching version of the Job Listing form
Route::delete('/jobs/{job}', function (JobListing $job) {
    $job->delete();
    return redirect()->route('showAllJobs');
})->name('deleteSingleJob');



// API stuff
Route::get('/api', function () {
    return ["foo" => "bar"];
})->name('api');

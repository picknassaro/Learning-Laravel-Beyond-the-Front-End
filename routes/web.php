<?php

use App\Http\Controllers\JobListingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobListingPosted;
use App\Jobs\TranslateJobListing;
use App\Models\JobListing;



// Home routes
Route::get('/', [JobListingController::class, 'index'])->name('home');

Route::get('/home', function () {
    return redirect()->route('home');
});



// Job Listing routes
// If we don't need all seven routes, we can do the following:
// 'only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']
// Or we can do the opposite:
// 'except' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']
Route::resource(
    'jobs',
    JobListingController::class,
    ['except' => ['index', 'show']] // Index and show need different URLs that are user-friendly
)->names([
            'create' => 'createJob',
            'store' => 'storeJob',
            'edit' => 'editJob',
            'update' => 'updateJob',
            'destroy' => 'destroyJob'
        ])->middleware('auth');
Route::get('/jobs', [JobListingController::class, 'index'])->name('showAllJobs');
Route::get('/jobs/{job}', [JobListingController::class, 'show'])->name('showSingleJob');



// User routes
Route::resource(
    'user',
    UserController::class,
    // index is not needed, and create needs a different URL that is user-friendly
    ['except' => ['index', 'create']]
)->names([
            'store' => 'storeUser',
            'show' => 'showSingleUser', // Not worked on yet
            'edit' => 'editUser', // Not worked on yet
            'update' => 'updateUser', // Not worked on yet
            'destroy' => 'destroyUser' // Not worked on yet
        ]);
Route::get('/signup', [UserController::class, 'create'])->name('signup');



// Session routes
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('storeSession');
Route::post('/logout', [SessionController::class, 'destroy'])->name('destroySession');



// Test emails
Route::get('/jobs/{job}/test-email/job-posted', function (JobListing $job) {
    Mail::to(
        'test@thirtydaystolearnlaravel.test'
    )->send(
            new JobListingPosted($job)
        );
    // REMEMBER TO RUN QUEUE WORKER
    // Note that dispatch has a slight delay
    TranslateJobListing::dispatch($job);
    return 'Test email sent';
    // If we have not set up an SMTP server, this will just log to a file, not actually send an email
    // Log is found in /storage/logs/laravel.log
})->name('jobPostedTestEmail')->middleware('auth', 'can:is-admin');

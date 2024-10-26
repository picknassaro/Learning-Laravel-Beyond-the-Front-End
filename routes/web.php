<?php

use App\Http\Controllers\JobListingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;



// Home routes
Route::get('/', function () {
    return redirect()->route('showAllJobs');
})->name('index');
Route::get('/home', function () {
    return redirect()->route('index');
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
    // index and edit are not needed, and create, store, and show need different URLs that are user-friendly
    ['except' => ['index', 'create', 'store', 'show', 'edit']]
)->names([
            'update' => 'updateUser', // Not worked on yet
            'destroy' => 'destroyUser' // Not worked on yet
        ])->middleware('auth');
Route::get('/signup', [UserController::class, 'create'])->name('signup')->middleware('guest');
Route::post('/signup', [UserController::class, 'store'])->name('storeUser')->middleware('guest');
Route::get('/dashboard', [UserController::class, 'show'])->name('dashboard')->middleware('auth');



// Session routes
Route::get('/login', [SessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->name('storeSession')->middleware('guest');
Route::post('/logout', [SessionController::class, 'destroy'])->name('destroySession')->middleware('auth');

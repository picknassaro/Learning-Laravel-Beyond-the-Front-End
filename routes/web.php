<?php

use App\Http\Controllers\JobListingController;
use App\Http\Controllers\UserController;
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
// if we don't need all seven routes, we can do the following:
// 'only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']
// or we can do the opposite:
// 'except' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']
Route::resource(
    'jobs',
    JobListingController::class
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
            'show' => 'showSingleUser',
            'edit' => 'editUser',
            'update' => 'updateUser',
            'destroy' => 'destroyUser'
        ]);
Route::get('/signup', [UserController::class, 'signup'])->name('signup');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'session'])->name('userSession');
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logout');



// API stuff
Route::get('/api', function () {
    return ['foo' => 'bar'];
})->name('api');

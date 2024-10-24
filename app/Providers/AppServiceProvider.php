<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\JobListing;
use Gate;
use Auth;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading();

        // Create a reusable check for whether or not the logged in user is the employer of a job listing
        Gate::define('edit-job', function (User $user, JobListing $job) {
            return $job->employer->user->is(Auth::user());
        });

        Gate::define('is-admin', function (User $user) {
            return $user->admin === 1;
        });

        Gate::define('is-returnRoute', function () {
            return in_array(Route::currentRouteName(), ['showAllJobs', 'showSingleJob']);
        });
    }
}

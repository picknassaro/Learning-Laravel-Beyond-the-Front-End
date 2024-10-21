<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\JobListing;
use Gate;
use Auth;

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
    }
}

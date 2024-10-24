<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employer;
use App\Models\JobListing;
use Auth;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.user.signup');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(User $user, Employer $employer)
    {
        $newUser = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
            'password' => ['required', Password::min(16)->max(256)->mixedCase()->letters()->numbers()->symbols(), 'confirmed'],
            // NOTE: because we are using Laravel's built-in User Model, we don't need to hash the password, because the casts() method in the User Model will hash it for us at read and write
            'employer_name' => ['nullable'],
        ]);

        if ($newUser['employer_name']) {
            $employerName = $newUser['employer_name'];
            unset($newUser['employer_name']);
        }

        $createdUser = $user::create($newUser);
        Auth::login($createdUser);

        if (isset($employerName)) {
            $employer::create([
                'user_id' => $createdUser->id,
                'employer_name' => $employerName
            ]);
        }

        if (isset($_COOKIE['postRedirectReturnUrl'])) {
            $redirectUrl = $_COOKIE['postRedirectReturnUrl'];
            unset($_COOKIE['postRedirectReturnUrl']);
            setcookie('postRedirectReturnUrl', '', time() - 3600, '/');
            return redirect($redirectUrl);
        } else {
            return redirect()->route('showAllJobs');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, Employer $employer, JobListing $jobListing)
    {
        $user = Auth::user();

        $employers = $employer::with('jobListings.employer')->where('user_id', $user->id)->get();

        $jobs = $jobListing::whereIn('employer_id', $employers->pluck('id'))->with('employer')->latest()->simplePaginate(4);

        return view('pages.user.dashboard', [
            'user' => $user,
            'employer' => $employers,
            'jobs' => $jobs,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        dd('Edit user ' . $user->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        dd('Update user ' . $user->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        dd('Destroy user ' . $user->id);
    }
}

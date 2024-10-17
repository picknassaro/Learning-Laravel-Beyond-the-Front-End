<?php

namespace App\Http\Controllers;

use App\Models\JobListing;

class JobListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = JobListing::with('employer')->latest()->simplePaginate(10);
        return view('pages.jobs.index', [
            'jobs' => $jobs
        ]);
        // ↑↑ with('employer') is not for allowing us to show the employers. That will work regardless.
        // It is an eager loading method that prevent an N+1 query problem. It will load all the employers in one query instead of loading them one by one.
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobListing $job)
    {
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
    }

    /**
     * Display the specified resource.
     */
    public function show(JobListing $job)
    {
        return view('pages.jobs.show', ['job' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobListing $job)
    {
        return view('pages.jobs.edit', ['job' => $job]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobListing $job)
    {
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobListing $job)
    {
        $job->delete();
        return redirect()->route('showAllJobs');
    }
}

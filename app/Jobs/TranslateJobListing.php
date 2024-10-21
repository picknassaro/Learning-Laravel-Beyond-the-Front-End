<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\JobListing;

class TranslateJobListing implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public JobListing $jobListing ) // using $jobListing to avoid a collision
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // REMEMBER TO RUN QUEUE WORKER
        logger('Translating job listing. Here is the job title: ' . $this->jobListing->title);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobListing extends Model
{
    use HasFactory;
    protected $table = 'job_listings';
    protected $fillable = ['title', 'description', 'location', 'job_type', 'salary', 'employer_id'];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    // This method is called applicants because it shows us which Users have applied to which JobListings. It is tracking a pivot table where we have foreign ids for job listings and foreign ids for users, hence the table name "job_listing_user". (Note the requirement for the table name to be the two models in alphabetical order, with underscores replacing camelcase.)
    public function applicants()
    {
        return $this->belongsToMany(User::class, 'job_listing_user');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class JobListing extends Model
{
    protected $table = 'job_listings';
    protected $fillable = ['title', 'description', 'location', 'type', 'salary'];
}

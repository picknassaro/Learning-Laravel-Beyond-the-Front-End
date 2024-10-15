<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Arr;

class JobListing extends Model
{
    use HasFactory;
    protected $table = 'job_listings';
    protected $fillable = ['title', 'description', 'location', 'type', 'salary'];
}

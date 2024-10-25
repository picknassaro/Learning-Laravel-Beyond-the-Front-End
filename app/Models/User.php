<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // This method is called job_applications because it shows us which Users have applied to which JobListings. It is tracking a pivot table where we have foreign ids for job listings and foreign ids for users, hence the table name "job_listing_user". (Note the requirement for the table name to be the two models in alphabetical order, with underscores replacing camelcase.)
    public function job_applications()
    {
        return $this->belongsToMany(JobListing::class, 'job_listing_user');
    }

    public function employer()
    {
        return $this->has(Employer::class);
    }
}

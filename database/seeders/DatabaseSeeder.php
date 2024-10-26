<?php

namespace Database\Seeders;

use App\Models\JobListing;
use App\Models\Employer;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->admin()->create([
            'first_name' => 'Nick',
            'last_name' => 'Passaro',
            'email' => 'admin@thirtydaystolearnlaravel.test',
            'password' => bcrypt('12345678901234567890'),
        ]);
        User::factory()->create([
            'first_name' => 'Pick',
            'last_name' => 'Nassaro',
            'email' => 'notadmin@thirtydaystolearnlaravel.test',
            'password' => bcrypt('12345678901234567890'),
        ]);
        Employer::factory(100)->create();
        JobListing::factory(1000)->create();

        // Fetch all job listings and users
        $jobListingIds = JobListing::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();

        // Create 1000 random job_listing_user entries
        for ($i = 0; $i < 1000; $i++) {
            DB::table('job_listing_user')->insert([
            'job_listing_id' => $jobListingIds[array_rand($jobListingIds)],
            'user_id' => $userIds[array_rand($userIds)],
            'created_at' => now(),
            'updated_at' => now(),
            ]);
        }
    }
}

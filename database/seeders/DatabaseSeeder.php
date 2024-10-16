<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\JobListing;
use App\Models\Employer;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->admin()->create();
        User::factory(100)->create();
        Employer::factory(100)->create();
        JobListing::factory(1000)->create();
        Tag::factory(250)->create();
    }
}

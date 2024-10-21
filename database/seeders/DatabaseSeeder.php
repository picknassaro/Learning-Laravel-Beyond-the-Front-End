<?php

namespace Database\Seeders;

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
        User::factory()->admin()->create([
            'first_name' => 'Nick',
            'last_name' => 'Passaro',
            'email' => 'admin@thirtydaystolearnlaravel.test',
            'password' => bcrypt('1234567890123456'),
        ]);
        Employer::factory(1000)->create();
        JobListing::factory(10000)->create();
    }
}

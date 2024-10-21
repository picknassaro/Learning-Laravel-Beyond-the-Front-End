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
            'password' => bcrypt('12345678901234567890'),
        ]);
        Employer::factory(1000)->create();
        JobListing::factory(10000)->create();
    }
}

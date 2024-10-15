<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobListing>
 */
class JobListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'employer_id' => \App\Models\Employer::inRandomOrder()->first()->id,
            'description' => fake()->paragraph(),
            'location' => fake()->randomElement([fake()->city(), 'Remote']),
            'type' => fake()->randomElement(['Full-time', 'Part-time']),
            'salary' => fake()->numerify('$###,###.##'),
        ];
    }
}

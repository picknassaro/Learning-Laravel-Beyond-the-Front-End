<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job
{
    public static function all(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Web Developer',
                'description' => 'Roll face around on keyboard until code is coded.',
                'location' => 'Remote',
                'type' => 'Full-time',
                'salary' => '$150,000.00 per year'
            ],
            [
                'id' => 2,
                'title' => 'Copywriter',
                'description' => 'Write da words good pls.',
                'location' => 'Remote',
                'type' => 'Full-time',
                'salary' => '$150,000.00 per year'
            ],
            [
                'id' => 3,
                'title' => 'Graphic Designer',
                'description' => 'Be pretty. Wait no we mean make pretty things, sorry.',
                'location' => 'Remote',
                'type' => 'Full-time',
                'salary' => '$150,000.00 per year'
            ]
        ];
    }

    public static function find(int $id): array
    {
        $job = Arr::first(static::all(), fn($job) => $job['id'] == $id);
        if (!$job)
            abort(404);
        return $job;
    }
}

<?php

namespace Database\Factories;

use App\Models\Major;
use Illuminate\Database\Eloquent\Factories\Factory;

class MajorFactory extends Factory
{
    protected $model = Major::class;

    public function definition(): array
    {
        $majors = ['AKL', 'TKJ', 'BID'];

        return [
            'name' => fake()->unique()->randomElement($majors),
        ];
    }
}
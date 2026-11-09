<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    protected $model = Subject::class;

    public function definition(): array
    {
        $subjects = ['Pemrograman Web Lanjutan', 'Pemrograman Web Dasar', 'Pemrograman Lanjut'];

        return [
            'name' => fake()->unique()->randomElement($subjects),
        ];
    }
}
<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'created_at' => $this->faker->date(),
            ];
    }
}

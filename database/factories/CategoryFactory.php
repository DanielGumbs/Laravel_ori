<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{

    public function definition()
    {
        return [
            'category_name' => $this->faker->jobTitle(),
            'created_at' => $this->faker->date(),
        ];
    }
}
<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Education;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EducationFactory extends Factory
{
    public $places;
    protected $model = Education::class;

    public function definition()
    {
        return [
            'education_name' => $this->faker->catchPhrase(),
            'description' => $this->faker->sentence(),
            'teacher_id' => $this->faker->numberBetween(1, Teacher::all()->count()),
            'category_id' => $this->faker->numberBetween(1, Category::all()->count()),
            'date' => $this->faker->date(),
            'starttime' => $this->faker->time(),
            'endtime' => $this->faker->time(),
            $places = 'amount' => $this->faker->numberBetween(1,31),
            'people' => $this->faker->randomNumber(1, $places),
        ];
    }
}

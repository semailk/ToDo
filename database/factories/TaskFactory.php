<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => Str::random(16),
            'task_description' => $this->faker->text(),
            'time_to_completion' => $this->faker->dateTime,
            'complete' => random_int(0, 1),
            'repeat_type' => [1,2,3]
        ];
    }
}

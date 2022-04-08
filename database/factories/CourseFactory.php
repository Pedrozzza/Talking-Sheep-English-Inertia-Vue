<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->text(),
            'date_start' => $this->faker->date(),
            'date_end' => $this->faker->date(),
            'destination' => $this->faker->country(),
            'price' => $this->faker->numberBetween(1000, 5000),
            'image' => $this->faker->imageUrl(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\CourseType;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CourseType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(10),
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->text(100),
        ];
    }
}

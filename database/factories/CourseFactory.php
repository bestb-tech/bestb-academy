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
        $price = rand(1,100)*100000+1000000;
        return [
            'name' => $this->faker->text(20),
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->text(200),
            'short_description' => $this->faker->text(100),
            'base_price' => $price,
            'sell_price' => $price - rand(1,5)*100000,
            'certificate_name' => $this->faker->text(10),
            'certificate_img_url' => $this->faker->text(10),
            'pass_point' => rand(80,100),
            'release_at' => $this->faker->dateTime
        ];
    }
}

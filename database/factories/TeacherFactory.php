<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teacher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_name' => $this->faker->firstName,
            'full_name' => $this->faker->name,
            'slug' => $this->faker->unique()->slug,
            'password' => Hash::make('1'),
            'email' => $this->faker->unique()->email,
            'phone_number' => $this->faker->phoneNumber,
            'avatar' => null,
            'description'=> $this->faker->text(200),
            'remember_token' => Str::random(10),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body' => $this->faker->realText(50),
            'user_id' => $this->faker->numberBetween(0, 7),
            'post_id' => $this->faker->numberBetween(2,5),
        ];
    }
}

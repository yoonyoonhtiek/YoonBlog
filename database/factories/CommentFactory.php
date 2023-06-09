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
            "content"   =>  $this->faker->paragraph,
            "article_id"    =>  rand(1,5),
            "user_id" => rand(1, 2),
        ];
    }
}

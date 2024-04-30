<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $usersIDS = User::pluck('id');
        return [
            'title' => fake()->text(10),
            'body' => fake()->text(50),
            'image' => fake()->text(20),
            'creator_id' => fake()->randomElement($usersIDS),
        ];
    }
}

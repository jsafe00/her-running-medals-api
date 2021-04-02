<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Medal;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'commentable_id' => Medal::factory(),
            'commentable_type' => Medal::class,
            'body' => $this->faker->text
        ];
    }
}
<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Medal;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Medal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category' => $this->faker->name,
            'image' => $this->faker->image,
            'event_id' => Event::factory(),
        ];
    }
}
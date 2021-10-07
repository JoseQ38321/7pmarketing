<?php

namespace Database\Factories;

use App\Models\Resource;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResourceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resource::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'title' => $this->faker->sentence(),
            'abstract' => $this->faker->text(100),
            'content' => $this->faker->text(1200),
            'views' => $this->faker->numberBetween(500, 1000),
            'status' => $this->faker->boolean()
        ];
    }
}

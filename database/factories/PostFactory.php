<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

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
            'image' => 'posts/'.$this->faker->image('public/storage/posts', 640, 400, null, false),
            'views' => $this->faker->numberBetween(500, 1000),
            'status' => $this->faker->boolean()
        ];
    }
}

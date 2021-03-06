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
            'title'=>$this->faker->realText($maxNbChars = 50),
            'description'=>$this->faker->sentence($nbWords = 15, $variableNbWords = true),
            'user_id'=>function(){
                $user_ids = User::pluck('id')->toArray(); // Create a collection with all the IDs of the existing users
                return $this->faker->randomElement($user_ids); // Return a random existing ID
            },
        ];
    }
}

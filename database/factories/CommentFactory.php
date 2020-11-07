<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
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
            'text'=>$this->faker->text($maxNbChars = 200),
            'post_id'=>function(){
                $post_ids = Post::pluck('id')->toArray(); // Create a collection with all the IDs of the existing posts
                return $this->faker->randomElement($post_ids); // Return a random existing post ID
            },
        ];
    }
}

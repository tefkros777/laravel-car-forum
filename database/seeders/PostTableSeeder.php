<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Posts
        $posts = Post::factory()->count(12)->create();

        // Manually attach tags to posts
        foreach($posts as $post){
            // Attach a random tag to every post
            $post->tags()->attach(Tag::inRandomOrder()->first());
        }

        // $post = new Post();
        // $post->title='Weird noise from AC';
        // $post->description='Wont stop playing baby shark';
        // $post->user_id=1;
        // $post->save();
        // $post->tags()->attach(1); // Tag 1
        // $post->tags()->attach(2); // Tag 2

    }
}

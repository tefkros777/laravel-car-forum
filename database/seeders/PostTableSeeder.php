<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $posts = Post::factory()->count(10)->create();

        $post = new Post();
        $post->title='Weird noise from AC';
        $post->description='Wont stop playing baby shark';
        $post->user_id=1;
        $post->save();
        $post->tags()->attach(1); // Tag 1
        $post->tags()->attach(2); // Tag 2

    }
}

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
        $posts = Post::factory()
            ->has(Tag::factory()->count(3)) // Create 3 tags and attach them to the post
            ->count(12)->create();

        // $post = new Post();
        // $post->title='Weird noise from AC';
        // $post->description='Wont stop playing baby shark';
        // $post->user_id=1;
        // $post->save();
        // $post->tags()->attach(1); // Tag 1
        // $post->tags()->attach(2); // Tag 2

    }
}

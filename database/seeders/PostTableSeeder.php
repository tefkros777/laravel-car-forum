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

        $posts = Post::factory()->count(3)->create();

        // $p1 = new Post();
        // $p1->title="Farting sound from exhaust";
        // $p1->description="Only occurs when my mother in law is in the car";
        // $p1->author_id = 31;
        // $p1->solved=true;
        // $p1->save();
    }
}

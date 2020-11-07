<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;


class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 15 comments using the factory
        $comments = Comment::factory()->count(15)->create();

        // Without factory:
        // $comm1 = new Comment();
        // $comm1->text="Ditch the rover";
        // $comm1->post_id=12;
        // $comm1->save();

        // $comm2 = new Comment();
        // $comm2->text="VTEC JUST KICKED IN!!!";
        // $comm2->post_id=43;
        // $comm2->save();
    }
}

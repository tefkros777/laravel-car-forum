<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag1 = new Tag();
        $tag1->label="Exhaust";
        $tag1->save();

        $tag2 = new Tag();
        $tag2->label="Oil Leaks";
        $tag2->save();

        $tag3 = new Tag();
        $tag3->label="Electrical";
        $tag3->save();
    }
}

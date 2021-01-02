<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Lisence;

class LisenceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $l = new Lisence();
        $l->lisence_number = "CY/1/907950";
        $l->lisence_country = "CY";
        $l->automatic = false;
        $l->user_id = "13"; // Admin
        $l->save();

    }
}

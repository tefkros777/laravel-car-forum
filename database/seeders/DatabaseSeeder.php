<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Call the respective Seeder class for each table
        $this->call(UserTableSeeder::class);
        $this->call(LisenceTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(CommentTableSeeder::class);
    }
}

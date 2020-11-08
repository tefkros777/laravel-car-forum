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
        // No need to seed Tags as PostTableSeeder does it for us
        $this->call(PostTableSeeder::class);
        $this->call(CommentTableSeeder::class);
    }
}

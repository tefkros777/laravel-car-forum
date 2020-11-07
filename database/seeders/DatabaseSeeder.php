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
        // Another way of calling the factory, bypassing the UserTableSeeder class. Both are correct
        // \App\Models\User::factory(10)->create();

        $this->call(UserTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(TagTableSeeder::class);
    }
}

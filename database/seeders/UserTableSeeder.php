<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Just create 3 users using the factory
        $users = User::factory()->count(12)->create();

        // Admin User
        $userAdmin = new User();
        $userAdmin->name="Admin";
        $userAdmin->password=bcrypt('secret123');
        $userAdmin->email="admin@test.com";
        $userAdmin->admin=true;
        $userAdmin->save();

        // Without a factory:
        // $user1 = new User();
        // $user1->name="Gianni Versace";
        // $user1->email="ilSultano@versace.it";
        // $user1->save();

        // $user2 = new User();
        // $user2->name="James May";
        // $user2->email="captain.slow@bbc.co.uk";
        // $user2->save();

        // $user3 = new User();
        // $user3->name="Matt Wattson";
        // $user3->email="mat.audi@carwow.co.uk";
        // $user3->save();
    }
}

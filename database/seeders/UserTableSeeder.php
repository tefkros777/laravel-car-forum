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
        $user1 = new User();
        $user1->name="Gianni Versace";
        $user1->email="ilSultano@versace.it";
        $user1->save();

        $user2 = new User();
        $user2->name="James May";
        $user2->email="captain.slow@bbc.co.uk";
        $user2->save();

        $user3 = new User();
        $user3->name="Matt Wattson";
        $user3->email="mat.audi@carwow.co.uk";
        $user3->save();
    }
}

<?php

use Illuminate\Database\Seeder;
use App\User;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $user=new User();
        $user->name="sanoj";
        $user->email="sanojsth42@gmail.com";
        $user->phone_number="9845419812";
        $user->password=bcrypt('2nr5g6');
        $user->save();
        $user2=new User();
        $user2->name="jonas";
        $user2->email="jonasahtserhs@gmail";
        $user2->phone_number="9845419812";
        $user2->password=bcrypt('2nr5g6');
        $user2->save();
    }
}

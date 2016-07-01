<?php

use Illuminate\Database\Seeder;
use App\contactUsList;
class ContactUsListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker\Factory::create();
    	contactUsList::truncate();
    	foreach(range(1,30) as $index) 
    	{
    		contactUsList::create([
    			'name'=>$faker->sentence,
    			'email'=>$faker->email,
    			'comment'=> $faker->paragraph(4),
    			]);
    	}
    }
}

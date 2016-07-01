<?php

use Illuminate\Database\Seeder;
use App\product;

class productTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker=Faker\Factory::create();
    	product::truncate();
    	foreach(range(1,30) as $index) 
    	{
    		product::create([
    			'product_name'=>$faker->sentence,
    			'product_quantity'=>5,
    			'product_weight'=>20,
    			'product_firstImage'=>$faker->imageUrl(300,200),
    			'product_secondImage'=>$faker->imageUrl(300,200),
                'product_price'=>2000.34,
    			'category_id'=>1,
    			'category_name'=>'gold',
    			'product_note'=> $faker->paragraph(4),
    			]);
    	}


    }
}

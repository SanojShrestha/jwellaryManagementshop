<?php

use Illuminate\Database\Seeder;
 
use App\product_category;

class categoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 DB::table('product_categories')->delete();
        $category=new product_category();
        $category->category_name="gold";
        $category->catgory_description="this is gold category";
        $category->save();
        $category1=new product_category();
        $category1->category_name="dimond";
        $category1->catgory_description="this is dimond category";
        $category1->save();
    }
}

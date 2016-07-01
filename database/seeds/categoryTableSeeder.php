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
        product_category::truncate();
        $category=new product_category();
        $category->category_name="gold";
        $category->catgory_description="this is gold category";
        $category->save();
        $category1=new product_category();
        $category1->category_name="dimond";
        $category1->catgory_description="this is dimond category";
        $category1->save();
        $category3=new product_category();
        $category3->category_name="chandi";
        $category3->catgory_description="this is chandi category";
        $category3->save();
        $category4=new product_category();
        $category4->category_name="best sell";
        $category4->catgory_description="this is bestSell category";
        $category4->save();
    }
}

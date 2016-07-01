<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$this->call(adminTableSeeder::class);
    	$this->command->info("admin table is seeded");
    	$this->call(userTableSeeder::class);
    	$this->command->info("user  table is seeded");
    	$this->call(categoryTableSeeder::class);
    	$this->command->info("category  table is seeded");
    	$this->call(siteDetailTableSeeder::class);
    	$this->command->info("siteDetail  table is seeded");
        $this->call(productTableSeeder::class);
        $this->command->info("product table is seeded");
        $this->call(ContactUsListTableSeeder::class);
        $this->command->info("userFeedback table is seeded");
    }
}

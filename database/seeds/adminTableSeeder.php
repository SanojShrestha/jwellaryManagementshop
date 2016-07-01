<?php

use Illuminate\Database\Seeder;
use App\admin;

class adminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     admin::truncate();
     $admin=new admin();
     $admin->name="sanoj";
     $admin->password=bcrypt('2nr5g6');
     $admin->save();
     
   }
 }

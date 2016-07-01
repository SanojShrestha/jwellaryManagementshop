<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable=['product_name','product_category','order_user_id','ordered_user','product_price'];
}

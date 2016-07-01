<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable=['product_name','product_quantity','product_weight','product_firstImage','prouduct_secondImage','product_note','category_id','category_name'];
}

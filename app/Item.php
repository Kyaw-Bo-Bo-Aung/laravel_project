<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
     protected $fillable = [
        'name', 'photo', 'price', 'discount', 'description', 'brand_id', 'subcategory_id'
    ];
     public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }

     public function brand()
    {
        return $this->belongsTo('App\Brand');
    }
}

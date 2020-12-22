<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'photo',
    ];

    public function subcategory()
    {
        return $this->hasMany("App\Subcategory");
    }

     public function item()
    {
        return $this->hasManyThrough('App\Item', 'App\Subcategory');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $fillable= ['orderdate','user_id','total','status','orderno','note'];


   public function items()
    {
        return $this->belongsToMany('App\Item', 'orderdetail')
                    ->withpivot('qty')
                    ->withTimestamps();
    }

	public function user($value='')
	{
    	return $this->belongsTo('App\User');
  	}
}


<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function getFood(){
        return $this->belongsToMany('App\Food', 'order_food', 'order_id','food_id')->withPivot('quantity');
    }

    public function getRestaurant(){
        return $this->belongsTo('App\Restaurant');
    }

}

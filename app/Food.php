<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';

    public function getRestaurantFood(){
        return $this->belongsTo('App\Restaurant');
    }

    public function getOrderFood(){
        return $this->belongsToMany('App\Food', 'order_food', 'food_id','order_id','quantity');
    }
}

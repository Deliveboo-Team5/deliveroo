<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function getFood(){
        return $this->belongsToMany('App\Order', 'order_food', 'order_id','food_id','quantity');
    }

}

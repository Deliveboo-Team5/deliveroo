<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table = 'restaurants';

    public function getUser(){
        return $this->belongsTo('App\User');
    }

    public function getCategory(){
        return $this->belongsToMany('App\Category', 'restaurant_category', 'restaurant_id','category_id');
    }

    public function getFood(){
        return $this->hasMany('App\Food');
    }
    public function getRestaurant(){
        return $this->hasMany('App\Order');
    }
    protected $fillable = ['name_restaurant','img','phone','address','VAT','user_id'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function getRestaurantCategory(){
        return $this->belongsToMany('App\Restaurant', 'restaurant_category', 'category_id','restaurant_id');
    }
}

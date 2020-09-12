<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    protected $fillable = [
        'name','color_image','black_image'
    ];
    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class,'food_category_restaurant','food_category_id','restaurant_id');
    }
//    public function menus()
//    {
//        return $this->hasMany(Menu::class);
//
//    }

}

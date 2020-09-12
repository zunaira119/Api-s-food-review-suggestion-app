<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Post extends Model
{

   protected $fillable = [
        'user_id', 'food_category_name','restaurant_id', 'food_rating', 'atm_rating', 'restaurant_name', 'restaurant_address', 'lat', 'lng', 'review'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function post_images()
    {
        return $this->hasMany(PostImage::class);
    }
    public function post_video()
    {
        return $this->hasOne(PostVideo::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
   public function post_likes()
   {
       return $this->hasMany(PostLike::class);
   }
    public function isAuthUserLikedPost()
    {
        $like = $this->post_likes()->where('user_id',  Auth::user()->id)->get();
        if ($like->isEmpty()){
            return false;
        }
        return true;
    }


}

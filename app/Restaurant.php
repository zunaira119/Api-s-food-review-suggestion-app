<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Restaurant extends Model
{
    protected $fillable=[
        'food_category_id','city','post_code','name','address','image','cover_photo','opening_time','closing_time','phone','lat','lng'
    ];
    public function getIsOpenAttribute()
    {
        return Carbon::now()->between(
            Carbon::parse($this->opening_time),
            Carbon::parse($this->closing_time)
        );
    }
    public function getAverageRateAttribute()
    {
        return $this->posts()->avg('food_rating');
    }
    public function food_categories()
    {
        return $this->belongsToMany(FoodCategory::class,'food_category_restaurant','restaurant_id','food_category_id');
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function bookmarks()
    {
        return $this->hasMany(BookMark::class);
    }
    // public function scopeSearch($query, $lat, $lng, $radius) {
    //     return Restaurant::all()->filter(function ($restaurant) use ($lat, $lng, $radius) {
    //         $actual = 3959 * acos(
    //             cos(deg2rad($lat)) * cos(deg2rad($restaurant->lat))
    //             * cos(deg2rad($restaurant->lng) - deg2rad($lng))
    //             + sin(deg2rad($lat)) * sin(deg2rad($restaurant->lat))
    //         );
    //         return $radius < $actual;
    //     });
    // }
    public function scopeSearch($query, $lat, $long, $radius) {

        return $query->having('distance', '<', $radius)
                 ->select(DB::raw("*,
                         (3959 * ACOS(COS(RADIANS($lat))
                               * COS(RADIANS(restaurants.lat))
                               * COS(RADIANS($long) - RADIANS(restaurants.lng))
                               + SIN(RADIANS($lat))
                               * SIN(RADIANS(restaurants.lat)))) AS distance")
                 )
                  ->get();
    }

//        $posts=Post::all();
//
//        foreach ($posts as $index => $post) {
//            $totalReviews = $post->food_rating->count();
//
//            if ($totalReviews) {
//                $totalRating = $post->food_rating->sum('food_rating');
//
//                return number_format($totalRating / $totalReviews, 1);
//            }
//        }
//
//        return 0;

//    public function scopeSearch($query, $s) {
//        $restaurants=Restaurant::with('food_categories')->get();
//        foreach ($restaurants->food_categories as $category)
//        {
//            $nam =$category->name;
//        }
//        $licenses = License::where('productName','like','%'.$search.'%')
//            ->orWhere('licenseNumber','like','%'.$search.'%')
//            ->orWhereHas('client', function ($query) use ($search) {
//                $query->where('name', 'like', '%'.$search.'%');
//            })
//            ->orderBy('id')
//            ->paginate(20);
//        return $query
//            ->where('name', 'like', "%" . $s . "%")
//            ->orWhere('city', 'like', "%" . $s . "%")
//            ->orWhere('post_code', 'like', "%" . $s . "%")
//            ->orWhereHas('food_Categories',function ($query) use ($s){
//                $query->where('name','like','%'.$s.'%');
//            })
//            ;
//    }
//    public function scopeBycategory($query,$c)
//    {
//        $restaurants=Restaurant::with('food_categories')->get();
//        foreach ($restaurants->categories as $category)
//        {
//            $name=$category->name;
//        }
//        return $query
//            ->where($name,'like',"%".$c."%");
//
//    }

}

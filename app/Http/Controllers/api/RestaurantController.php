<?php

namespace App\Http\Controllers\api;

use App\FoodCategory;
use App\Http\Controllers\Controller;
use App\Post;
use App\Restaurant;
use App\Filter;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use SKAgarwal\GoogleApi\PlacesApi;
use Symfony\Component\Console\Input\Input;
use function GuzzleHttp\Psr7\str;

if (!defined('RESTAURANT_PROFILE_PATH')) define('RESTAURANT_PROFILE_PATH', URL::to('/') . '/images/resprofile_images/');
if (!defined('RESTAURANT_COVER_PATH')) define('RESTAURANT_COVER_PATH', URL::to('/') . '/images/rescover_images/');
if (!defined('BASE_URL_POST')) define('BASE_URL_POST', URL::to('/') . '/images/post_images/');
if (!defined('BASE_URL_POST_VIDEO')) define('BASE_URL_POST_VIDEO', URL::to('/') . '/videos/post_videos/');

class RestaurantController extends Controller
{
    public function search_by_review()
    {
        $user = auth()->user();
        $userIds = $user->followings()->pluck('following_id')->toArray();
        $restaurants = Restaurant::WhereHas('posts', function ($query) use ($user, $userIds) {
            $query->whereIn('user_id', $userIds)->orWhere('user_id', $user->id);
        })->get();
    }

    public function top_rated()
    {
        $rating = 7;
//        $sql->orderByRaw($match . " DESC", array($against));
        $restaurants = Restaurant::WhereHas('posts', function ($query) use ($rating) {
            $query->havingRaw('AVG(food_rating) > ?', array($rating))->orderByRaw('AVG(food_rating)');
        })->get();
//        $restaurants=Restaurant::all();
//        foreach ($restaurants as $restaurant)
//        {
//            $rating=$restaurant->posts()->avg('food_rating');
//            dd($rating);
//
//        }
        return response()->json([
            'restaurants' => $restaurants
        ]);
    }

    public function search_by_category(FoodCategory $foodCategory, Request $request)
    {
        $restaurants = Restaurant::WhereHas('food_categories', function ($query) use ($foodCategory) {
            $query->where('name', 'like', '%' . $foodCategory->name . '%');
        })->get();
        return response()->json([
            'restaurants' => $restaurants
        ]);
    }

    public function search_by_bookmark()
    {
        $user = auth()->user();
        $restaurants = Restaurant::WhereHas('bookmarks', function ($query) use ($user) {
            $query->Where('user_id', $user->id);
        })->get();
        return response()->json([
            'restaurants' => $restaurants
        ]);
    }

    public function restaurants()
    {

        $restaurants = Restaurant::all();
        foreach ($restaurants as $index => $restaurant) {
            $restaurant->image = RESTAURANT_PROFILE_PATH . $restaurant->image;
            $restaurant->cover_photo = RESTAURANT_COVER_PATH . $restaurant->cover_photo;
            $restaurant->posts = Post::where('restaurant_id', $restaurant->id)->with('post_images', 'post_video')->get();
//            $totalReviews = $restaurant->posts()->count();
//            $sum = 0;
//            if ($totalReviews) {
//                foreach ($restaurant->posts as $key => $post) {
//                    $sum = $sum + collect($post->food_rating)->sum();
//                }
//                $restaurant->rating = $sum / $totalReviews;
//            }
            $restaurant->rating = $restaurant->getAverageRateAttribute();
            $restaurant->is_open = $restaurant->getIsOpenAttribute();
            $restaurant->isfeatured = $restaurant->featured;
            $restaurant->categories = $restaurant->food_categories();
        }
        return response()->json([
            'restaurants' => $restaurants,
            'BASE_URL_POST' => BASE_URL_POST,
            'BASE_URL_POST_VIDEO' => BASE_URL_POST_VIDEO
        ]);
    }

    public function restaurant_detail(Restaurant $restaurant, Request $request)
    {
        $user=auth()->user();
        $restaurant->image = RESTAURANT_PROFILE_PATH . $restaurant->image;
        $restaurant->cover_photo = RESTAURANT_COVER_PATH . $restaurant->cover_photo;
        $restaurant->is_open = $restaurant->getIsOpenAttribute();
        $restaurant->posts = Post::where('restaurant_id', $restaurant->id)->with('post_images', 'post_video', 'user')->withCount('post_likes')->get();
        $restaurant->rating = $restaurant->getAverageRateAttribute();
        $userbookmarkes = Restaurant::whereHas('bookmarks', function($query) use ($user) {
            return $query->where('user_id', $user->id);
        })->get();

            foreach ($userbookmarkes as $userbookmarke)
            {
                if ($restaurant->id === $userbookmarke->id)
                {
                    $status=true;
                }
                else
                {
                    $status=false;
                }
            }
        return response()->json([
            'restaurant' => $restaurant,
            'BASE_URL_POST' => BASE_URL_POST,
            'BASE_URL_POST_VIDEO' => BASE_URL_POST_VIDEO,
            'status'=>$status
        ]);
    }

    public function restaurant_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'food_category_id' => 'nullable',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'image' => 'nullable',
            'lat' => 'required',
            'lng' => 'required',
            'cover_photo' => 'nullable',
            'opening_time' => 'required',
            'closing_time' => 'required',
            'city' => 'required',
            'post_code' => 'required'
        ]);
        if ($validator->fails())
            return response()->json([
                'message' => 'validation error',
                'data' => $validator->errors(),
                'status' => false
            ], 422);
        DB::beginTransaction();
        try {

            $restaurant = Restaurant::create($request->all());
            $restaurant->save();
            // you need to save product before adding images
            if ($request->food_category_id) {
                $restaurant->food_categories()->sync([$request->food_catagory_id]);
            }
            $image = $request->image;
            $cover_photo = $request->cover_photo;
            if ($request->hasFile('image')) {
                $destination = 'images/resprofile_images';
                $filename = strtolower(
                    pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)
                    . '-'
                    . uniqid()
                    . '.'
                    . $image->getClientOriginalExtension()
                );
                $image->move($destination, $filename);
                str_replace(" ", "-", $filename);
                $restaurant->image = $filename;
                $restaurant->save();
            }
            if ($request->hasFile('cover_photo')) {
                $destination = 'images/rescover_images';
                $name = strtolower(
                    pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)
                    . '-'
                    . uniqid()
                    . '.'
                    . $cover_photo->getClientOriginalExtension()
                );
                $cover_photo->move($destination, $name);
                str_replace(" ", "-", $name);
                $restaurant->cover_photo = $name;
                $restaurant->save();
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json([
                'message' => $exception->getMessage()
            ], 403);
        }
        return response()->json([
            'message' => 'restaurant added ',
            'status' => true
        ]);
    }

    public function near_by_restaurants(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lat' => 'required',
            'lng' => 'required',
            'rad' => 'required'
        ]);
        $latitude = $request->lat;
        $longitude = $request->lng;
        $radius = $request->rad;

        $restaurants = DB::table('restaurants')
            ->select('restaurants.*', DB::raw("6371 * acos(cos(radians(" . $latitude . "))
     * cos(radians(lat))
     * cos(radians(lng) - radians(" . $longitude . "))
     + sin(radians(" . $latitude . "))
     * sin(radians(restaurants.lat))) AS distance"))
            ->having('distance', '<', $radius)
            ->get();
        foreach ($restaurants as $index => $restaurant) {
            $restaurant->image = RESTAURANT_PROFILE_PATH . $restaurant->image;
            $restaurant->cover_photo = RESTAURANT_COVER_PATH . $restaurant->cover_photo;
            $restaurant->rating = $restaurant->posts()->count();
        }
        return response()->json([
            'restaurants' => $restaurants
        ]);
    }

    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search' => 'required',
            'lat' => 'nullable',
            'lng' => 'nullable',
            'radius' => 'nullable'
        ]);
        $search = $request->search;
        $query = $request->search;
        if ($query == 'anywhere') {
            $restaurants = Restaurant::all()->take(10);;
        } elseif ($request->has('radius')) {
            $s = $request->input('lat');
            $a = $request->input('lng');
            $b = $request->input('radius');
            $restaurants = Restaurant::Search($s, $a, $b);
            //         $restaurants = DB::table('restaurants')->select('restaurants.*', DB::raw("3956 * acos(cos(radians(" . $latitude . "))
            //  * cos(radians(restaurants.lat))
            //  * cos(radians(restaurants.lng) - radians(" . $longitude . "))
            //  + sin(radians(" . $latitude . "))
            //  * sin(radians(restaurants.lat))) AS distance"))
            //             ->having('distance', '<=', $request->radius)
            //             ->get();
        } else {
//            $s = $request->input('search');
//            $restaurants = Restaurant::all()->Search($s)->get();
            $restaurants = Restaurant::where('name', 'like', '%' . $request->search . '%')
                ->orWhere('city', 'like', '%' . $request->search . '%')
                ->orWhere('post_code', 'like', '%' . $request->search . '%')
                ->orWhereHas('food_categories', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })->get();
        }
        foreach ($restaurants as $index => $restaurant) {
            $restaurant->image = RESTAURANT_PROFILE_PATH . $restaurant->image;
            $restaurant->cover_photo = RESTAURANT_COVER_PATH . $restaurant->cover_photo;
            $restaurant->rating = $restaurant->getAverageRateAttribute();
        }
        return response()->json([
            'restaurants' => $restaurants,
        ]);
    }

    public function search_restaurant(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_review' => 'nullable|integer',
            'top_rated' => 'nullable|integer',
            'bookmark' => 'nullable|integer',
            'food_category' => 'nullable|integer',
            'id' => 'nullable|integer'
        ]);

        $user = auth()->user();
        $userIds = $user->followings()->pluck('following_id')->toArray();
        $foodCategories = FoodCategory::all();
        $filters = Filter::all();
        $rating = 7;
        foreach ($filters as $key => $filter) {
            if ($request->user_review == $filter->id) {
                $restaurants = Restaurant::WhereHas('posts', function ($query) use ($user, $userIds) {
                    $query->whereIn('user_id', $userIds);
                })->get();
            } elseif ($request->top_rated == $filter->id) {
                $restaurants = Restaurant::WhereHas('posts', function ($query) use ($rating) {
                    $query->havingRaw('AVG(food_rating) > ?', array($rating))->orderByRaw('AVG(food_rating)', "DESC");
                })->get();
            } elseif ($request->bookmark == $filter->id) {
                $restaurants = Restaurant::WhereHas('bookmarks', function ($query) use ($user) {
                    $query->Where('user_id', $user->id);
                })->get();
            } elseif ($request->food_category == $filter->id) {
                $foodCategories = FoodCategory::all();
                foreach ($foodCategories as $key => $foodCategory) {
                    $restaurants = Restaurant::WhereHas('food_categories', function ($query) use ($foodCategory) {
                        $query->where('food_category_id', $foodCategory->id);
                    })->get();
                }
            } elseif (($request->user_review == $filter->id) && ($request->top_rated == $filter->id)) {
                $restaurants = Restaurant::WhereHas('posts', function ($query) use ($rating, $user, $userIds) {
                    $query->whereIn('user_id', $userIds)->havingRaw('AVG(food_rating) > ?', array($rating))->orderByRaw('AVG(food_rating)', "DESC");
                })->get();
            } elseif (($request->user_review == $filter->id) && ($request->bookmark == $filter->id)) {
                $restaurants = Restaurant::WhereHas('posts', function ($query) use ($user, $userIds) {
                    $query->whereIn('user_id', $userIds);
                })->WhereHas('bookmarks', function ($query) use ($user) {
                    $query->Where('user_id', $user->id);
                })->get();
            } elseif (($request->user_review == $filter->id) && ($request->food_category == $filter->id)) {
                foreach ($foodCategories as $key => $foodCategory) {
                    $restaurants = Restaurant::WhereHas('posts', function ($query) use ($foodCategory, $user, $userIds) {
                        $query->whereIn('user_id', $userIds);
                    })->WhereHas('food_categories', function ($query) use ($foodCategory) {
                        $query->where('food_category_id', $foodCategory->id);
                    })->get();
                }
            } //top rated
            elseif (($request->top_rated == $filter->id) && ($request->bookmark == $filter->id)) {
                $restaurants = Restaurant::WhereHas('posts', function ($query) use ($rating, $user) {
                    $query->havingRaw('AVG(food_rating) > ?', array($rating))->orderByRaw('AVG(food_rating)', "DESC");
                })->WhereHas('bookmarks', function ($query) use ($user) {
                    $query->Where('user_id', $user->id);
                })->get();
            } elseif (($request->top_rated == $filter->id) && ($request->food_category == $filter->id)) {
                foreach ($foodCategories as $key => $foodCategory) {
                    $restaurants = Restaurant::WhereHas('posts', function ($query) use ($rating, $user) {
                        $query->havingRaw('AVG(food_rating) > ?', array($rating))->orderByRaw('AVG(food_rating)', "DESC");
                    })->WhereHas('food_categories', function ($query) use ($foodCategory) {
                        $query->where('food_category_id', $foodCategory->id);
                    })->get();

                }
            } elseif (($request->bookmark == $filter->id) && ($request->food_category == $filter->id)) {
                foreach ($foodCategories as $key => $foodCategory) {
                    $restaurants = Restaurant::WhereHas('bookmarks', function ($query) use ($user) {
                        $query->Where('user_id', $user->id);
                    })->WhereHas('food_categories', function ($query) use ($foodCategory) {
                        $query->where('food_category_id', $foodCategory->id);
                    })->get();
                }
            } elseif (($request->user_review == $filter->id) && ($request->top_rated == $filter->id) && ($request->bookmark == $filter->id)) {
                $restaurants = Restaurant::WhereHas('posts', function ($query) use ($rating, $user, $userIds) {
                    $query->whereIn('user_id', $userIds)->havingRaw('AVG(food_rating) > ?', array($rating))->orderByRaw('AVG(food_rating)', "DESC");
                })->WhereHas('bookmarks', function ($query) use ($user) {
                    $query->Where('user_id', $user->id);
                })->get();
            } elseif (($request->user_review == $filter->id) && ($request->top_rated == $filter->id) && ($request->food_category == $filter->id)) {
                foreach ($foodCategories as $key => $foodCategory) {
                    $restaurants = Restaurant::WhereHas('posts', function ($query) use ($rating, $user, $userIds) {
                        $query->whereIn('user_id', $userIds)->havingRaw('AVG(food_rating) > ?', array($rating))->orderByRaw('AVG(food_rating)', "DESC");
                    })->WhereHas('food_categories', function ($query) use ($foodCategory) {
                        $query->where('food_category_id', $foodCategory->id);
                    })->get();
                }
            } elseif (($request->user_review == $filter->id) && ($request->bookmark == $filter->id) && ($request->food_category == $filter->id)) {
                foreach ($foodCategories as $key => $foodCategory) {
                    $restaurants = Restaurant::WhereHas('posts', function ($query) use ($user, $userIds) {
                        $query->whereIn('user_id', $userIds);
                    })->WhereHas('bookmarks', function ($query) use ($user) {
                        $query->Where('user_id', $user->id);
                    })->WhereHas('food_categories', function ($query) use ($foodCategory) {
                        $query->where('food_category_id', $foodCategory->id);
                    })->get();
                }
            } elseif (($request->user_review == $filter->id) && ($request->top_rated == $filter->id) && ($request->bookmark == $filter->id) && ($request->food_category == $filter->id)) {
                foreach ($foodCategories as $key => $foodCategory) {
                    $restaurants = Restaurant::WhereHas('posts', function ($query) use ($rating, $user, $userIds) {
                        $query->whereIn('user_id', $userIds)->havingRaw('AVG(food_rating) > ?', array($rating))->orderByRaw('AVG(food_rating)', "DESC");
                    })->WhereHas('bookmarks', function ($query) use ($user) {
                        $query->Where('user_id', $user->id);
                    })->WhereHas('food_categories', function ($query) use ($foodCategory) {
                        $query->where('food_category_id', $foodCategory->id);
                    })->get();
                }
            } else {
                $restaurants = Restaurant::all();
            }
        }
        foreach ($restaurants as $index => $restaurant) {
            $restaurant->image = RESTAURANT_PROFILE_PATH . $restaurant->image;
            $restaurant->cover_photo = RESTAURANT_COVER_PATH . $restaurant->cover_photo;
            $restaurant->rating = $restaurant->getAverageRateAttribute();
        }
        return response()->json([
            'restaurants' => $restaurants,
        ]);
    }
}

<?php

namespace App\Http\Controllers\api;

use App\BookMark;
use App\Http\Controllers\Controller;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

if (!defined('RESTAURANT_PROFILE_PATH')) define('RESTAURANT_PROFILE_PATH', URL::to('/') . '/images/resprofile_images/');
if (!defined('RESTAURANT_COVER_PATH')) define('RESTAURANT_COVER_PATH', URL::to('/') . '/images/rescover_images/');
class BookMarkController extends Controller
{
    public function add_to_bookmark(Restaurant $restaurant)
    {
        auth()->user()->bookmarks()->create([
            'restaurant_id' => $restaurant->id
        ]);
        return response()->json([
            'message' => 'successfully bookmarked'
        ]);
    }
    public function remove_from_bookmark(BookMark $bookmark)
    {
        $bookmark->delete();

        return response()->json([
            'message' => 'successfully bookmark removed'
        ]);
    }

    public function bookmarks()
    {
        $user= auth()->user();
        $bookmarks = BookMark::where('user_id',$user->id)->with('restaurant')->get();
        foreach ($bookmarks as $index => $bookmark)
        {
            $bookmark->restaurant->image=RESTAURANT_PROFILE_PATH.$bookmark->restaurant->image;
            $bookmark->restaurant->cover_photo=RESTAURANT_COVER_PATH.$bookmark->restaurant->cover;
        }
        return response()->json([
            'bookmarks' => $bookmarks
        ]);
    }

}

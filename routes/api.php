<?php

use Chencha\Share\Share as Share;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group(['namespace'=>'api'],function(){
    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@login');
    Route::get('logout', 'UserController@logout')->middleware('auth:api');
    Route::get('user_profile/{user}','UserController@user_profile')->middleware('auth:api');
    Route::get('profile','UserController@profile')->middleware('auth:api');
    Route::post('profile_update', 'UserController@profile_update')->middleware('auth:api');
    Route::get('user_posts', 'UserController@user_posts')->middleware('auth:api');
    Route::post('follow/{userId}', 'UserController@follow')->middleware('auth:api');
    Route::post('unfollow/{userId}', 'UserController@unfollow')->middleware('auth:api');
    Route::get('followers','UserController@followers')->middleware('auth:api');
    Route::get('followings','UserController@followings')->middleware('auth:api');
    Route::get('news_feed','UserController@news_feed')->middleware('auth:api');
    Route::get('user','UserController@user')->middleware('auth:api');
    Route::post('remove_follower/{user}','UserController@remove_follower')->middleware('auth:api');


    //forgot password
    Route::post('forgot_password', 'ForgotPasswordController@forgot_password');
    Route::post('confirm_code', 'ForgotPasswordController@confirm_code');
    Route::post('update_password', 'ForgotPasswordController@update_password');

    //Food category
    Route::get('food_categories', 'FoodCategoryController@food_categories');
    Route::post('food_category_store', 'FoodCategoryController@store');
    Route::put('food_category/update/{food_category}', 'FoodCategoryController@update')->middleware('auth:api');
    Route::delete('food_category/delete/{food_category}', 'FoodCategoryController@delete')->middleware('auth:api');



    //post
        Route::get('posts', 'PostController@posts')->middleware('auth:api');
        Route::post('post_store', 'PostController@post_store')->middleware('auth:api');
        Route::put('post_update/{post}', 'PostController@post_update')->middleware('auth:api');
        Route::delete('c/{post_image_id}', 'PostController@delete_post_image');
        Route::delete('post/delete/{post}', 'PostController@delete');
        Route::get('popular_posts','PostController@popular_posts');
//        Route::get('share_post/{post}','PostController@share_post');
//    Route::get('share_post', function()
//    {
//        return (new Chencha\Share\Share)->load('http://www.example.com', 'My example')->services();
//    });

        //comments
    Route::post('add_comment/{post}', 'CommentController@add_comment')->middleware('auth:api');
    Route::get('post_comments/{post}', 'PostController@post_comments');

    //post likes
    Route::get('like_post/{post}', 'PostLikeController@like_post')->middleware('auth:api');
    Route::get('unlike_post/{postLike}', 'PostLikeController@unlike_post')->middleware('auth:api');
//    Route::get('likePost/{post}', 'LikeController@likePost')->middleware('auth:api');

    //restaurants
    Route::get('restaurants', 'RestaurantController@restaurants');
    Route::get('restaurant_detail/{restaurant}', 'RestaurantController@restaurant_detail')->middleware('auth:api');
    Route::post('restaurant_store', 'RestaurantController@restaurant_store');
    Route::post('near_by_restaurants','RestaurantController@near_by_restaurants');
    Route::post('search','RestaurantController@search');
    Route::post('search_restaurant','RestaurantController@search_restaurant')->middleware('auth:api');

    Route::get('top_rated','RestaurantController@top_rated');
    Route::get('search_by_review/{user}','RestaurantController@search_by_review');
    Route::get('search_by_bookmark','RestaurantController@search_by_bookmark')->middleware('auth:api');
    Route::get('search_by_category/{food_category}','RestaurantController@search_by_category');

    //bookmarks
    Route::get('add_to_bookmark/{restaurant}', 'BookmarkController@add_to_bookmark')->middleware('auth:api');
    Route::get('remove_from_bookmark/{bookmark}', 'BookmarkController@remove_from_bookmark')->middleware('auth:api');
    Route::get('bookmarks', 'BookmarkController@bookmarks')->middleware('auth:api');

    //filters
    Route::get('filters', 'FilterController@filters');
    Route::post('filter_store', 'FilterController@store');

});
Route::get('migrate-refresh', function () {
    /* php artisan migrate */
    Artisan::call('migrate:refresh');
    return Artisan::output();
});

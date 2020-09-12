<?php

namespace App\Http\Controllers\api;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Post;
use App\PostImage;
use App\Restaurant;
use App\User;
use Artisanry\SocialShare\Share;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

if (!defined('BASE_URL_POST')) define('BASE_URL_POST', URL::to('/') . '/images/post_images/');
if (!defined('BASE_URL_POST_VIDEO')) define('BASE_URL_POST_VIDEO', URL::to('/') . '/videos/post_videos/');
if (!defined('BASE_URL')) define('BASE_URL', URL::to('/') . '/images/profile_images/');


class PostController extends Controller
{

    public function posts(Request $request)
    {
//        $data = Post::with('post_images','post_video','user')->withCount('post_likes','comments')->get();
//        return response()->json([
//            'posts' => $data,
//            'BASE_URL POST'=>BASE_URL_POST,
//            'BASE_URL_POST_VIDEO'=>BASE_URL_POST_VIDEO
//        ]);
        $user = auth()->user();
        $userIds = $user->followings()->pluck('following_id')->toArray();
        $posts = Post::whereIn('user_id', $userIds)->orWhere('user_id', $user->id)->with('post_images', 'post_video', 'user')->withCount('post_likes', 'comments')->orderBy('created_at', 'ASC')->get();
        $profileLikedPosts = Post::whereHas('post_likes', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();
        $userLikedPosts = Post::whereHas('post_likes', function($query) use ($user) {
            return $query->where('user_id', $user->id);
        })->get();
        foreach ($posts as $post)
        {
            foreach ($userLikedPosts as $userLikedPost)
            {
                if ($post->id === $userLikedPost->id)
                {
                    $post->status=true;
                }
                else
                {
                    $post->status=false;
                }
            }
        }
        return response()->json([
            'posts' => $posts,
            'BASE_URL_USER_IMAGE' => BASE_URL,
            'BASE_URL_POST_VIDEO' => BASE_URL_POST_VIDEO,
            'BASE_URL_POST_IMAGE' => BASE_URL_POST,

        ]);
    }

    public function post_comments(post $post)
    {
        $post_comments = $post->comments()->with('user')->get();
        return response()->json([
            'post_comments' => $post_comments,
            'BASE_URL' => BASE_URL
        ]);
    }

    public function popular_posts()
    {
        $popular_posts = Post::withCount('post_likes', 'comments')->with('post_images', 'post_video', 'user')->orderBy('post_likes_count', 'desc')->get();
        return response()->json([
            'popular_posts' => $popular_posts,
            'BASE_URL POST' => BASE_URL_POST,
            'BASE_URL_POST_VIDEO' => BASE_URL_POST_VIDEO
        ]);
    }
//    public function share_post(Post $post)
//    {
//
//        $url=Share::facebook(route('post.show', $post->id));
//        return response()->json([
//           'url'=>$url
//        ]);
//    }

    public function post_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'food_category_name' => 'required',
            'restaurant_id' => 'required',
            'atm_rating' => 'nullable',
            'restaurant_name' => 'nullable',
            'lat' => 'required',
            'lng' => 'required',
            'review' => 'nullable',
            'food_rating' => 'nullable'
        ]);
        if ($validator->fails())
            return response()->json([
                'message' => 'validation error',
                'data' => $validator->errors(),
                'status' => false
            ], 422);
        $user = auth()->user();
        $request['user_id'] = $user->id;
        DB::beginTransaction();
        try {
            $post = Post::create($request->all());
            $post->save();
            // you need to save product before adding images
            if ($request->hasFile('post_images')) {
                $post_images = $request->file('post_images');
                foreach ($post_images as $post_image) {
                    $name = strtolower(
                        pathinfo($post_image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . uniqid() . '.' . $post_image->getClientOriginalExtension()
                    );
                    $post_image->move(public_path() . '/images/post_images/', $name);
                    // this is the reason of saved product
                    str_replace(" ", "-", $name);
                    DB::table('post_images')->insert([
                        'post_id' => $post->id,
                        'image' => $name
                    ]);
                }
            }
            if ($request->hasFile('post_video')) {
                $post_video = $request->file('post_video');
//                $input = time().$post_video->getClientOriginalExtension();
//                $destinationPath = '/videos/post_videos';
//                $post_video->move($destinationPath, $input);
                $file = strtolower(
                    pathinfo($post_video->getClientOriginalName(), PATHINFO_FILENAME) . '-' . uniqid() . '.' . $post_video->getClientOriginalExtension()
                );
                $post_video->move(public_path() . '/videos/post_videos/', $file);
                // this is the reason of saved product
               str_replace(" ", "-", $file);
                DB::table('post_videos')->insert([
                    'post_id' => $post->id,
                    'video' => $file
                ]);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json([
                'message' => $exception->getMessage()
            ], 403);
        }

        return response()->json([
            'message' => 'post created ',
            'status' => true
        ]);
    }

    public function post_update(Request $request, post $post)
    {
        $validator = Validator::make($request->all(), [
            'food_category_name' => 'required',
            'atm_rating' => 'nullable',
            'restaurant_name' => 'nullable',
            'lat' => 'required',
            'lng' => 'required',
            'review' => 'nullable',
            'food_rating' => 'nullable'
        ]);
        if ($validator->fails())
            return response()->json([
                'message' => 'validation error',
                'data' => $validator->errors(),
                'status' => false
            ], 422);
        $user = auth()->user();
        $request['user_id'] = $user->id;
        DB::beginTransaction();
        try {
            $post->update($request->all());
            $post_images = $request->post_images;
            if ($request->hasfile('post_images')) {
                foreach ($request->file('post_images') as $post_image) {
                    $name = $post_image->getClientOriginalName();
                    $post_image->move(public_path() . '/images/post_images/', $name);
                    $data[] = $name;
                    DB::table('post_images')->insert([
                        'post_id' => $post->id,
                        'image' => $name
                    ]);
                }
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json([
                'message' => $exception->getMessage()
            ], 403);
        }
        return response()->json([
            'message' => 'post updated',
            'status' => true
        ]);
    }

    public function delete_post_image($post_image_id)
    {
        DB::beginTransaction();
        try {
            unlink(public_path(DB::table('post_images')->where('id', $post_image_id)->first()->image));
            DB::table('post_images')->where('id', $post_image_id)->delete();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json([
                'message' => $exception->getMessage()
            ], 403);
        }
        return response()->json([
            'message' => 'post Image Deleted'
        ]);

    }

    public function delete(Post $post)
    {
        DB::beginTransaction();
        try {
            $ids = DB::table('post_images')->where('post_id', $post->id)->get()->toArray();
            foreach ($ids as $id) {
                unlink(public_path(DB::table('post_images')->where('id', $id->id)->first()->image));
            }
            DB::table('post_images')->where('post_id', $post->id)->delete();
            $post->delete();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json([
                'message' => $exception->getMessage()
            ], 403);
        }

        return response()->json([
            'message' => 'post Deleted'
        ]);
    }


}


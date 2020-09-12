<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\post;
use App\PostLike;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function like_post(post $post)
    {
            if($post->isAuthUserLikedPost())
            {
                return response()->json([
                    'status' => false
                ]);
            }
            else
            {
                auth()->user()->post_likes()->create([
                    'post_id' => $post->id
                ]);
            }
        return response()->json([
            'status' => true
        ]);
    }
    public function unlike_post(PostLike $postLike)
    {
        $postLike->delete();

        return response()->json([
            'status' => true
        ]);
    }


}

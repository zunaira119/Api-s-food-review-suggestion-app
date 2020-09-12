<?php

namespace App\Http\Controllers\api;

use App\Comment;
use App\Http\Controllers\Controller;
use App\post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function add_comment(Request $request, post $post)
    {
        $request->validate([
            'comment' => 'required|string'
        ]);

        $request['user_id'] = auth()->user()->id;
        $post->comments()->create($request->all());

        return response()->json([
            'message'=>'comment successfully added',
            'status' => true
        ]);
    }


}

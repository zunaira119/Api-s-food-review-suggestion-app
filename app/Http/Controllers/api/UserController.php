<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Psy\Util\Str;
use Symfony\Component\Console\Input\Input;

//if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
//// Ignores notices and reports all other kinds... and warnings
//    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
//// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
//}
if (!defined('BASE_URL')) define('BASE_URL',URL::to('/').'/images/Uprofile_images/');
if (!defined('BASE_URL_COVER')) define('BASE_URL_COVER',URL::to('/').'/images/Ucover_images/');

if (!defined('BASE_URL_POST')) define('BASE_URL_POST',URL::to('/').'/images/post_images/');
if (!defined('BASE_URL_POST_VIDEO')) define('BASE_URL_POST_VIDEO',URL::to('/').'/videos/post_videos/');

class UserController extends Controller
{
    public function generateRandomString($length = 16)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            array(
                'name' => 'required|string|max:191',
                'email' => 'required|email|max:255|unique:users',
                'username' => 'nullable|string|max:191|unique:users',
                'password' => 'required',
                'address' => 'nullable',
                'bio' => 'nullable',
                'image' => 'nullable|image',
                'cover_photo'=>'nullable|image'
            ));

        if ($validator->fails()) {
            $error_messages = implode(',', $validator->messages()->all());
            $response_array = array('status' => false, 'error_code' => 101, 'message' => $error_messages);
        }
        else {
            $request['password'] = bcrypt($request->password);
            DB::beginTransaction();
            try {
                $user = User::create($request->all());
                $image=$request->image;
                $cover_photo=$request->cover_photo;
                $destination = 'images/Uprofile_images';
                if ($request->hasFile('image')) {
                    $filename = strtolower(
                        pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)
                        . '-'
                        . uniqid()
                        . '.'
                        . $image->getClientOriginalExtension()
                    );
                    $image->move($destination, $filename);
                    str_replace(" ", "-", $filename);
                    $user->image = $filename;
                    $user->save();
                }
                if ($request->hasFile('cover_photo')) {
                    $destination = 'images/Ucover_images';
                    $name = strtolower(
                        pathinfo($cover_photo->getClientOriginalName(), PATHINFO_FILENAME)
                        . '-'
                        . uniqid()
                        . '.'
                        . $cover_photo->getClientOriginalExtension()
                    );
                    $cover_photo->move($destination, $name);
                    str_replace(" ", "-", $name);
                    $user->cover_photo = $name;
                    $user->save();
                }
                $data['Authorization'] = 'Bearer' . ' ' . $user->createToken('MyApp')->accessToken;
                DB::commit();
            } catch (\Exception $exception) {
                DB::rollBack();
                return response()->json([
                    'message' => $exception->getMessage()
                ], 403);
            }
            $auth_token = $this->generateRandomString();
            $response_array = array('status' => true, 'status_code' => 200, 'data' => $data, 'auth_token' => $auth_token);
        }
        $response = response()->json($response_array, 200);
        return $response;
    }
    public function login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),[
                'email' => 'required',
                'password' => 'required',
            ]);
        if ($validator->fails()) {
            $error_messages = implode(',', $validator->messages()->$request->all());
            $response_array = array('status' => false, 'error_code' => 101, 'message' => $error_messages);
        }
        else {
            $user = User::where(function ($query) use ($request) {
                $query->where('email', $request->email)->first();
            })->first();

            if (!$user)
                return response()->json([
                    'message' => 'incorrect email',
                    'status'=>false
                ], 403);

            if (!auth()->loginUsingId((password_verify($request->password, $user->password)) ? $user->id : 0))
                return response()->json([
                    'message' => 'incorrect password',
                    'status'=>false
                ], 403);
            $user = auth()->user();
            $request['user_id'] = $user->id;
            $request['name']=$user->name;
            $request['username']=$user->username;
            $request['image'] = BASE_URL.$user->image;
            $request['cover_photo'] = BASE_URL_COVER.$user->cover_photo;
            $data = 'Bearer' . ' ' . $user->createToken('MyApp')->accessToken;
            $auth_token = $this->generateRandomString();
            $response_array = array('user_id'=>$request->user_id,
                'name'=>$request->name,'username'=>$request->username,'email'=>$request->email,
                'image'=>$request->image,
                'cover_photo'=>$request->cover_photo,
                'status' => true,'status_code'=>200,'message' => 'Logged in successfully',
                'auth_token'=>$auth_token,'data'=>$data);
        }
        $response = response()->json($response_array, 200);
        return $response;
    }
    public function profile(Request $request)
    {
        $user = auth()->user();
        $user['followers'] = $user->followers()->count();
        $user['followings'] = $user->followings()->count();
        $user['posts'] = $user->posts()->count();
        $user['user_posts'] = Post::Where('user_id', $user->id)->with('post_images','post_video')->withCount('post_likes','comments')->orderBy('created_at', 'DESC')->get();
//        $user['image']=UserImage::Where('user_id', $user->id)->get();
        $user['image']=BASE_URL.$user->image;
        $user['cover_photo']=BASE_URL_COVER.$user->cover_photo;
        $profile = $user;
        return response()->json([
            'profile' => $profile,
            'BASE URL POST'=>BASE_URL_POST,
            'BASE_URL_POST_VIDEO'=>BASE_URL_POST_VIDEO
        ]);
    }
    public function user_profile(Request $request,User $user)
    {
        $user1 = auth()->user();
        if ($user1->isFollowing($user)) {
            $status=true;
        } else {
            $status=false;
        }
        $user['followers'] = $user->followers()->count();
        $user['followings'] = $user->followings()->count();
        $user['posts'] = $user->posts()->count();
        $user['status']=$status;
        $user['user_posts'] = Post::Where('user_id', $user->id)->with('post_images','post_video')->withCount('post_likes','comments')->orderBy('created_at', 'DESC')->get();
        $user['image']=BASE_URL.$user->image;
        $user['cover_photo']=BASE_URL_COVER.$user->cover_photo;
        $profile = $user;
        return response()->json([
            'profile' => $profile,
            'BASE URL POST'=>BASE_URL_POST,
            'BASE_URL_POST_VIDEO'=>BASE_URL_POST_VIDEO
        ]);
    }
    public function profile_update(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'address' => 'nullable',
                'bio' => 'nullable',
                'image' => 'nullable|image',
                'cover_photo'=>'nullable|image'
            ]);
        if ($validator->fails())
            return response()->json([
                'message' => 'Validation Error',
                'data' => $validator->errors(),
                'status' => false
            ], 422);

            $user = auth()->user();

        if ($request->email)
            if ($request->email != $user->email) {
                $validator = Validator::make($request->all(), [
                    'email' => 'required|email|max:191|unique:users',
                ]);
                if ($validator->fails())
                    return response()->json([
                        'message' => 'validation Error',
                        'data' => $validator->errors(),
                        'status' => false
                    ], 422);

            } else
                $request->request->remove('email');

        if ($request->old_password)
            if (password_verify($request->old_password, $user->password)) {
                $validator = Validator::make($request->all(), [
                    'password' => 'required|string|min:6|max:191'
                ]);
                if ($validator->fails())
                    return response()->json([
                        'message' => 'Validation Error',
                        'data' => $validator->errors(),
                        'status' => false
                    ], 422);

                $request['password'] = bcrypt($request->password);
            } else
                $request->request->remove('password');

        DB::beginTransaction();
        try {
            $user->update($request->all());
            $image = $request->image;
            $cover_photo=$request->cover_photo;
            $destination = 'images/profile_images';
            if ($request->hasFile('image'))
            {
                $filename = strtolower(
                    pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)
                    . '-'
                    . uniqid()
                    . '.'
                    . $image->getClientOriginalExtension()
                );
            $image->move($destination, $filename);
            $user->image = $filename;
                $user->update();
        }
            if ($request->hasFile('cover_photo')) {
                $destination = 'images/Ucover_images';
                $name = strtolower(
                    pathinfo($cover_photo->getClientOriginalName(), PATHINFO_FILENAME)
                    . '-'
                    . uniqid()
                    . '.'
                    . $cover_photo->getClientOriginalExtension()
                );
                $cover_photo->move($destination, $name);
                str_replace(" ", "-", $name);
                $user->cover_photo = $name;
                $user->update();
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json([
                'message' => $exception->getMessage()
            ]);
        }
        return response()->json([
            'message' => 'profile updated',
            'status'=>true
        ]);
    }
    public function user_posts(Request $request)
    {
        $user = Auth::user();
        $user_posts = Post::with('post_images','post_videos')->Where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();
        return response()->json([
            'user_posts' => $user_posts,
            'BASE_URL_POST'=>BASE_URL_POST,
            'BASE_URL_POST_VIDEO'=>BASE_URL_POST_VIDEO
        ]);
    }
    public function user()
    {
        $user=auth()->user();
        return response()->json([
            'user' => $user
        ]);
    }
    public function follow($userId)
    {
        $user = User::find($userId);
        if(! $user) {
            return response()->json([
                'message' => 'user not found',
                'status'=>false
            ]);
        }
        $user->followers()->attach(auth()->user()->id);
        return response()->json([
            'message' => 'successfully followed the user',
            'status'=>true
        ]);
    }
    public function unfollow($userId)
    {
        $user = User::find($userId);
        if(! $user) {

            return response()->json([
                'message' => 'user not found',
                'status'=>false
            ]);
        }
        $user->followers()->detach(auth()->user()->id);
        return response()->json([
            'message' => 'successfully unfollowed the user',
            'status'=>true
        ]);
    }
    public function followers(Request $request)
    {
        $followers=auth()->user()->followers;
        return response()->json([
            'followers' => $followers
        ]);
    }
    public function followings(Request $request)
    {
        $followings=auth()->user()->followings;
        return response()->json([
            'followings' => $followings,
        ]);
    }
    public function remove_follower(Request $request, User $user)
    {

        $id = User::where('id',$user->id)->firstOrFail();
        auth()->user()->followers()->detach($id);
        return response()->json([
            'status' => true,
        ]);
    }
    public function news_feed(Request $request)
    {
        $user=auth()->user();
        $userIds = $user->followings()->pluck('following_id')->toArray();
        $posts = Post::whereIn('user_id', $userIds)->orWhere('user_id', $user->id)->with('post_images','post_videos','users')->orderBy('created_at', 'DESC')->get();
        return response()->json([
            'news feed posts' => $posts,
            'BASE_URL_USER_IMAGE'=>BASE_URL,
            'BASE_URL_POST_VIDEO'=>BASE_URL_POST_VIDEO,
            'BASE_URL_POST_IMAGE'=>BASE_URL_POST
        ]);
    }
    public function logout()
    {
        auth()->user()->token()->revoke();
        return response()->json([
            'message' => 'logout successfully',
            'status'=>true
        ]);

    }


}

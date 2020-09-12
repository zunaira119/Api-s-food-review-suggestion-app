<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class authCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $errors = array();
        $errors['status'] = false;

        $auth_id = $request->header('authId');
        $auth_token = $request->header('auth_token');

        if (!$auth_id) {
            $auth_id = $request->authId;
            if(!$auth_id)
            {
                $errors['message'] = 'auth id should not be null';
                return response()->json($errors);
            }
        }
        if (!$auth_token) {
            $auth_token = $request->auth_token;
            if(!$auth_token)
            {
                $errors['message'] = 'auth token should not be null';
                return response()->json($errors);
            }
        }
        $check_auth = DB::table('users')
            ->where('id', $auth_id)
            ->where('auth_token', $auth_token)->count();
//        if ($check_auth == 0) {
//
//            $check_auth = DB::table('delivery_partners')
//                ->where('id', $auth_id)
//                ->where('auth_token', $auth_token)->count();
//
//        }
        if ($check_auth == 0) {
            $errors['message'] = 'Auth id , Auth token doesn`t match';
            return response()->json($errors,401);
        }

        $request->authId = $auth_id;
        $request->auth_token = $auth_token;
        return $next($request);
    }
}

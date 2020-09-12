<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Mail\ForgotPasswordMail;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;



class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password' ,'address','bio','username','image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guarded = [
        'password'
    ];



    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function posts()
    {
        return $this->hasMany(post::class);
    }
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'following_id', 'follower_id')->withTimestamps();
    }
    public function followings()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'following_id')->withTimestamps();
    }
    public function isFollowing(User $user)
    {
        return !! $this->followings()->where('following_id', $user->id)->count();
    }
    public function isFollowedBy(User $user)
    {
        return !! $this->followers()->where('follower_id', $user->id)->count();
    }
   public function post_likes()
   {
       return $this->hasMany(PostLike::class);
   }
    public function bookmarks()
    {
        return $this->hasMany(BookMark::class);
    }
    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }




}

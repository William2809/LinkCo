<?php

namespace App\Models;


use App\Traits\Like;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Like;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'userType',
        'username',
        'sector',
        'country',
        'phone',
        'dob',
        'gender',
        'background',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function gravatar($size = 100)
    {
        $default = "mm";
        return "https://www.gravatar.com/avatar/" . md5(strtolower(trim($this->email))) . "?d=" . urlencode($default) . "&s=" . $size;
    }

    //postings
    public function postings() //relationship-> one to many (1 user -> many postings)
    {
        return $this->hasMany(Posting::class);
    }

    //comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //likes
    public function totalLikes()
    {
        return $this->belongsToMany(Posting::class, 'likes', 'post_id', 'liked_posting_user_id')->withTimestamps();
    }

    //follow and unfollow
    public function followings() //relation
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'followed_user_id')->withTimestamps();
    }

    public function followers() //relation
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_user_id', 'user_id')->withTimestamps();
    }

    public function follows(User $user) //action
    {
        return $this->followings()->save($user);
    }

    public function unfollows(User $user) //action
    {
        return $this->followings()->detach($user);
    }

    public function hasFollow(User $user)
    {
        return $this->followings()->where('followed_user_id', $user->id)->exists();
    }


    //other function

    public function homeTimeline()
    {
        $following = $this->followings->pluck('id'); //generates id from the followed users

        return Posting::whereIn('user_id', $following)
            ->orWhere('user_id', $this->id)
            ->latest()
            ->get();
    }

    public function showPosting()
    {
        return Posting::where('user_id', $this->id)->latest()->get();
    }

    public function makePosting($string)
    {
        $this->postings()->create([
            'body' => $string,
            'identifier' => Str::slug(Str::random(31) . $this->id),
        ]);
    }
}

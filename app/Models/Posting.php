<?php

namespace App\Models;

use App\Traits\like;
use Egulias\EmailValidator\Parser\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    use HasFactory, like;

    protected $fillable = ['body', 'identifier'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function totalLikes()
    {
        return $this->belongsToMany(Posting::class, 'likes', 'post_id', 'liked_posting_user_id')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}

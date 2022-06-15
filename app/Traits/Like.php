<?php

namespace App\Traits;

use App\Models\Posting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait like
{
    public function likes()
    {
        return $this->belongsToMany(Posting::class, 'likes', 'liked_posting_user_id', 'post_id')->withTimestamps();
    }

    public function totalLikes()
    {
        return $this->belongsToMany(Posting::class, 'likes', 'post_id', 'liked_posting_user_id')->withTimestamps();
    }
    public function likePost(Posting $posting)
    {
        return $this->likes()->save($posting);
    }

    public function unlikePost(Posting $posting)
    {
        return $this->likes()->detach($posting);
    }

    public function hasLike(Posting $posting)
    {
        return $this->likes()->where('post_id', $posting->id)->exists();
    }
}

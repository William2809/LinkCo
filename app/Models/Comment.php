<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posting()
    {
        return $this->belongsTo(Posting::class);
    }

    // public function comments()
    // {
    //     return $this->belongsToMany(Posting::class, 'comments', 'user_comment_id', 'post_id')->withTimestamps();
    // }

    // public function totalComments()
    // {
    //     return $this->belongsToMany(Posting::class, 'comments', 'post_id', 'user_comment_id')->withTimestamps();
    // }
    // public function commentPost(Posting $posting)
    // {
    //     return $this->comments()->save($posting);
    // }

    // public function deleteComment(Posting $posting)
    // {
    //     return $this->comments()->detach($posting);
    // }

    // public function hasComment(Posting $posting)
    // {
    //     return $this->comments()->where('post_id', $posting->id)->exists();
    // }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Posting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class commentController extends Controller
{

    public function store(Request $request, Posting $posting)
    {
        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = Auth::user()->id;
        $posting->comments()->save($comment);
        return redirect()->back();
    }
    
    public function deleteComment(Comment $comment)
    {
        // dd($posting);
        DB::table('comments')->delete($comment->id);
        return redirect()->back();
    }
}

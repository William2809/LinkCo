<?php

namespace App\Http\Controllers;

use App\Models\Posting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class likeController extends Controller
{
    public function store(Posting $posting)
    {
        $user = Auth::user();

        $user->hasLike($posting) ? $user->unlikePost($posting) : $user->likePost($posting);
        // dd($posting);

        // $user->likePost($posting);
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class followingController extends Controller
{
    public function store(Request $request, User $user)
    {
        if (Auth::user()->hasFollow($user)) {

            Auth::user()->unfollows($user);
        } else {
            Auth::user()->follows($user);
        }
        return back()->with("success", "You are following the user");
    }
}

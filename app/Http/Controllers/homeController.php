<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function __invoke(Request $request)
    {
        $postings = Auth::user()->homeTimeline(); //function in user model

        return view('home', compact('postings'));
    }
}

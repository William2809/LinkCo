<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class landingController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {


        if (Auth::check()) {
            $postings = Auth::user()->homeTimeline(); //function in user model

            return view('home', compact('postings'));
        }

        return view('landing');
    }
}

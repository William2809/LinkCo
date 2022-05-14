<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userTypeController extends Controller
{
    public function new()
    {
        // dd("asd");
        return view('auth.user-type');
    }

    public function store(Request $request)
    {
        $request->validate([
            'userType' => ['required'],
        ]);

        auth()->user()->update(['userType' => $request->userType]);
        // dd($request);
        return redirect('home');
    }
}

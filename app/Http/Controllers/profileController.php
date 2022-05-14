<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    public function index(Request $request, User $user)
    {
        $postings = Auth::user()->showPosting();

        return view('users.profile', compact('user', 'postings'));
        // return view('users.profile', ["user" => $user, "postings" => $postings]);
    }

    public function viewDetail(Request $request, User $user)
    {
        return view('users.profileDetail', compact('user'));
    }

    public function update(Request $request)
    {
        // dd($request);
        // $attr = $request->validate([
        //     'phone' => ['required'],
        //     'email' => ['email', 'min:3', 'required'],
        //     'sector' => ['required'],
        //     'userType' => ['required'],
        //     'gender' => ['required'],
        //     'dob' => ['required'],
        //     'country' => ['required'],
        // ]);

        // dd($attr);
        // auth()->user()->update($attr);
        // auth()->user()->update(['userType' => $request->userType]);


        // dd($request);
        auth()->user()->update([
            'phone' => $request->phone,
            'email' => $request->email,
            'sector' => $request->sector,
            'userType' => $request->userType,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'country' => $request->country,

        ]);


        return redirect()->back()->with('message', 'Your profile has been updated');
    }
}

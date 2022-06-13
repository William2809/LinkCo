<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function updateBackground(Request $request)
    {
        auth()->user()->update([
            'background' => $request->background,
        ]);

        return redirect()->back()->with('message', 'Your profile background has been updated');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        if (Hash::check($request->current_password, auth()->user()->password)) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
            return back()->with('message', 'Your password has been successfully updated');
        }

        throw ValidationException::withMessages([
            'current_password' => 'Your current password is wrong',
        ]);
    }
}

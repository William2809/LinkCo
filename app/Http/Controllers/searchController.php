<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class searchController extends Controller
{
    public function searchPage(Request $request)
    {
        // dd(request('search'));
        $users = User::latest();

        if (request('search')) {
            $users->where('name', 'like', '%' . request('search') . '%');
        }

        return view('search', [
            'users' => $users->get(),
        ]);
    }
}

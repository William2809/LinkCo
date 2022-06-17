<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class notificationController extends Controller
{
    public function __invoke(Request $request)
    {

        $users = User::latest();

        return view('notification', ['users' => $users->get()]);
    }
}

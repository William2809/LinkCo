<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostingRequest;
use App\Models\Posting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class postingController extends Controller
{
    public function store(PostingRequest $request)
    {
        $request->make($request->body);
        return redirect()->back();
    }
}

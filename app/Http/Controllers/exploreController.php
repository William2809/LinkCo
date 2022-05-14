<?php

namespace App\Http\Controllers;

use App\Models\Posting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class exploreController extends Controller
{
    public function __invoke(Request $request)
    {

        return view('explore', [
            'postings' => Posting::latest()->get()->all(),
        ]);
    }
}

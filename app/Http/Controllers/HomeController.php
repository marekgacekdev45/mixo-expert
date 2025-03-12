<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Offer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $home = Home::firstOrFail();
        $offers =  Offer::orderBy('sort', 'asc')->select('slug', 'title', 'icon', 'short_desc',)->get();

        return view('pages.home.index', compact('home','offers'));
    }
}

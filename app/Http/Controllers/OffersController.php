<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function show($slug)
    {

        $locale = app()->getLocale();
        
        $offer = Offer::where("slug->{$locale}", $slug)->firstOrFail();

    
        return view('pages.offers.show',compact('offer',));
    }
}

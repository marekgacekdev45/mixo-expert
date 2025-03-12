<?php

namespace App\Http\Controllers;

use App\Models\Realisation;
use Illuminate\Http\Request;
use App\Models\RealisationsPage;

class RealisationsController extends Controller
{
    public function index () {

        $content = RealisationsPage::firstOrFail();
        $realisations = Realisation::orderBy('sort', 'asc')->select('slug', 'title', 'thumbnail',)->get();;

        return view('pages.realisations.index',compact('content','realisations'));
    }

    public function show($slug)
    {

        $locale = app()->getLocale();
        

        $realisation = Realisation::where("slug->{$locale}", $slug)->firstOrFail();

       


        return view('pages.realisations.show',compact('realisation',));
    }
}

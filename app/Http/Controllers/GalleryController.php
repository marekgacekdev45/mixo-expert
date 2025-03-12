<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryPage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){

        $content = GalleryPage::firstOrFail();
        $images =  $images = Gallery::orderBy('sort','asc')->get();

        return view ('pages.gallery.index',compact('content','images'));
    }
}

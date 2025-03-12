<?php

namespace App\Http\Controllers;

use App\Models\ContactPage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {

        $content = ContactPage::firstOrFail();

      

        return view('pages.contact.index', compact('content',));
    }
}

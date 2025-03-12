<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrivacyPolicyPage;

class PrivacyPolicyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $content = PrivacyPolicyPage::firstOrFail();
        return view('pages.privacy-policy.index', compact('content'));
    }
}

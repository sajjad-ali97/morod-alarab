<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;

class PageController extends Controller
{
    public function about()
    {
        $settings = SiteSetting::first();
        return view('pages.about', compact('settings'));
    }

    public function contact()
    {
        $settings = SiteSetting::first();
        return view('pages.contact', compact('settings'));
    }
}

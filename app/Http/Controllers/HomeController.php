<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\HeroSlide;
use App\Models\SiteSetting;

class HomeController extends Controller
{
    public function index()
    {
        $slides = HeroSlide::where('is_active', true)->orderBy('sort_order')->get();
        $categories = Category::where('is_active', true)->orderBy('sort_order')->take(8)->get();
        $settings = SiteSetting::first();

        return view('home', compact('slides', 'categories', 'settings'));
    }
}

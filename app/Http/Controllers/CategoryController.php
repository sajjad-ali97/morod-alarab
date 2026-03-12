<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SiteSetting;

class CategoryController extends Controller
{
    public function index()
    {

        $categories = Category::withCount('products')->latest()->get();
        $settings = SiteSetting::first();


        return view('categories.index', compact('categories', 'settings'));
    }
}

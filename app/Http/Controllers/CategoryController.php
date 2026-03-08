<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SiteSetting;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $settings = SiteSetting::first();

        return view('categories.index', compact('categories', 'settings'));
    }
}

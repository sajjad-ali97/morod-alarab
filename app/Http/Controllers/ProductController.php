<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $selectedCategory = $request->query('category');

        $products = Product::with('category')
            ->where('is_active', true)
            ->when($selectedCategory && $selectedCategory !== 'all', function ($query) use ($selectedCategory) {
                $query->whereHas('category', function ($q) use ($selectedCategory) {
                    $q->where('slug', $selectedCategory);
                });
            })
            ->orderBy('sort_order')
            ->latest('id')
            ->get();

        $settings = SiteSetting::first();

        return view('products.index', compact('products', 'categories', 'selectedCategory', 'settings'));
    }
}

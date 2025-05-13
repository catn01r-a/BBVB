<?php

namespace App\Http\Controllers;

use App\Models\Product;

class PublicProductController extends Controller
{
    // Show all products publicly
    public function index()
    {
        $products = Product::latest()->paginate(10); // Show 10 products per page
        return view('public.products.index', compact('products'));
    }
}

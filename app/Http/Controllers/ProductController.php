<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // Show list of products for the logged-in seller
    public function index()
    {
        $products = Auth::user()->products()->latest()->get();
        return view('products.index', compact('products'));
    }

    // Show form to create a new product
    public function create()
    {
        return view('products.create');
    }

    // Save the new product
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ]);

        Auth::user()->products()->create($request->all());

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // Show form to edit an existing product
    public function edit(Product $product)
    {
        $this->authorizeOwnership($product);
        return view('products.edit', compact('product'));
    }

    // Update the product
    public function update(Request $request, Product $product)
    {
        $this->authorizeOwnership($product);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // Delete a product
    public function destroy(Product $product)
    {
        $this->authorizeOwnership($product);

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    // Extra security: Make sure seller owns the product
    private function authorizeOwnership(Product $product)
    {
        if ($product->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }
    }
}

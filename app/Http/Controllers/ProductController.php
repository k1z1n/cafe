<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return response()->json($product);
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $products = Product::where('title', 'LIKE', "%{$query}%")->get();

        return response()->json($products);
    }
}

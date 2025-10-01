<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $notFoundMessage = ['error' => 'Prodotto non trovato'];

    /**
     * Returns a listing of products.
     */
    public function index()
    {
        $products = Product::all();

        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => '',
            'price' => 'required|numeric|min:0'
        ]);

        $product = Product::create($validated);
        return response()->json($product, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $product = Product::findOrFail($id);

        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {

        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => '',
            'price' => 'required|numeric|min:0'
        ]);

        $product->update($validated);

        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return response()->json(['success' => 'The pizza has been deleted']);
    }
}

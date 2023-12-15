<?php

// app/Http/Controllers/ProductController.php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();

        return response()->json(['data' => $products]);
    }

    public function show($id)
    {
        $product = Product::with('category')->find($id);

        if (!$product) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        return response()->json(['data' => $product]);
    }

    public function store(Request $request)
    {
        $request->validate([
            // Aturan validasi Anda di sini
        ]);

        $product = Product::create($request->all());

        return response()->json(['data' => $product], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // Aturan validasi Anda di sini
        ]);

        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        $product->update($request->all());

        return response()->json(['data' => $product]);
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Produk berhasil dihapus']);
    }
}

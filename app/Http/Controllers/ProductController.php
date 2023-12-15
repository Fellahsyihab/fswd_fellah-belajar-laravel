<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // Mendapatkan semua produk
    public function index()
    {
        $products = Product::all();

        return response()->json(['data' => $products], 200);
    }

    // Membuat produk baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'category_id' => 'required|integer',
            'product_code' => 'required|string',
            'price' => 'required|numeric',
            'unit' => 'required|string',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $product = Product::create($request->all());

        return response()->json(['data' => $product, 'message' => 'Product added successfully!'], 201);
    }

    // Mendapatkan detail produk berdasarkan ID
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json(['data' => $product], 200);
    }

    // Mengupdate produk berdasarkan ID
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'category_id' => 'required|integer',
            'product_code' => 'required|string',
            'price' => 'required|numeric',
            'unit' => 'required|string',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $product->update($request->all());

        return response()->json(['data' => $product, 'message' => 'Product updated successfully!'], 200);
    }

    // Menghapus produk berdasarkan ID
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully!'], 200);
    }
}

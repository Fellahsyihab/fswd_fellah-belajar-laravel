<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getData()
    {
        // Logika untuk mengambil data dari database atau sumber lainnya
        return response()->json([
            'totalProducts' => 100,
            'totalCategories' => 5,
            'totalHarga' => 50000,
            'totalStok' => 200,
        ]);
    }
}

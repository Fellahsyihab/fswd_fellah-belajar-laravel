<?php

namespace App\Http\Controllers;

// app/Http/Controllers/HomeController.php

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalPrice = Product::sum('price');
        $totalStock = Product::sum('stock');

        $categories = Category::withCount('products')->get();

        return view('pages.dashboard', compact('totalProducts', 'totalCategories', 'totalPrice', 'totalStock', 'categories'));
    }
}

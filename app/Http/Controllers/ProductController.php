<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Product $product){
        $itemsLess = Product::where('stock','<=', 5)->get();
        return view('frontend.pages.single-product', compact('product','itemsLess'));
    }
}

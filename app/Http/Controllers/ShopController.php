<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        $products = Product::all();
        $itemsLess = Product::where('stock','<=', 5)->get();
        return view('frontend.pages.category', compact('products', 'itemsLess'));
    }
}

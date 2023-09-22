<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $randomItems = Product::inRandomOrder()->take(4)->get();
        $items = Product::take(8)->get();
        $products = Product::where('stock','<=', 5)->get();
        $lastFourProducts = Product::latest()->take(4)->get(); 
        return view('frontend.index', compact('randomItems', 'items', 'products', 'lastFourProducts'));
    }

}

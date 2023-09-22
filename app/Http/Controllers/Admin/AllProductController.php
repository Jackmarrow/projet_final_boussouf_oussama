<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Panier;
use App\Models\Product;
use Illuminate\Http\Request;

class AllProductController extends Controller
{
    public function index(){

        $products = Product::all();

        return view('admin.pages.product', compact('products'));
    }
}

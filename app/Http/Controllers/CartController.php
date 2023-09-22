<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $paniers = Panier::all();
        return view('frontend.pages.cart', compact('paniers'));
    }
}

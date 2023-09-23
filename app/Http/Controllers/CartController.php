<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Product;
use App\Models\UserProduct;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $user = auth()->user();
        // $paniers = Panier::where('user_id',$user->id)->get();
        $paniers = $user->boughtProducts;
        // dd($paniers[0]->paniers[0]->quantity);
        return view('frontend.pages.cart', compact('paniers'));
    }
}

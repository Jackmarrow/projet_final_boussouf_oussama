<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        // User currently loged in
        $user = auth()->user();
        // User Panier
        $paniers = Panier::where('user_id',$user->id)->get();
        return view('frontend.pages.cart', compact('paniers'));
    }
}

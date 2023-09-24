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
        // Products total
        $total = 0;
        foreach ($paniers as $panier) {
            $total = $total + ($panier->quantity * $panier->product->price);
        }

        return view('frontend.pages.cart', compact('paniers','total'));
    }

    public function increment(Panier $panier){
        // Check if stock still has this product
        if($panier->product->stock > 0){
            $panier->update([
                'quantity'=>$panier->quantity + 1,
            ]);
    
            $panier->product->update([
                'stock'=> $panier->product->stock - 1,
            ]);
            return back();
        } 
        // Product out of stock
        else {
            toastr()->info('This product is out of stock');
            return back();
        }
    }
    public function decrement(Panier $panier){
        //Check if product quantity in basket
        if($panier->quantity == 1){
            $panier->delete();
            return back();
        } 
        else {
            $panier->update([
                'quantity'=>$panier->quantity - 1,
            ]);
    
            $panier->product->update([
                'stock'=> $panier->product->stock + 1,
            ]);
            return back();
        }
    }
}

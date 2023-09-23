<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\PanierProduct;
use App\Models\Product;
use App\Models\UserProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddToCartController extends Controller
{
    public function store(Product $product){

        //Check if User Authenticate
        if(Auth::user()){

            $user = auth()->user();

            // Check if product exist
            $exist = Panier::where('user_id', $user->id)->where('product_id',$product->id)->first();;
            
            if($exist){
                $exist->increment('quantity');
            } 
            else{
                Panier::create([
                    'user_id'=>$user->id,
                    'product_id'=>$product->id,
                    'quantity'=>1
                ]);
            }

            $product->decrement('stock');

            return back();
        } 
        //IF NOT AUTHENTICATE 
        else{
            return back()->with('warning', 'You should be loged in to add an item to cart');
        }

    }
}

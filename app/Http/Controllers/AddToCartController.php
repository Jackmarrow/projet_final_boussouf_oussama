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
    public function store(Request $request, Product $product){

        //Check if User Authenticate
        if(Auth::user()){

            $user = auth()->user();

            // Check if product exist
            $exist = Panier::where('user_id', $user->id)->where('product_id',$product->id)->first();
            

            // Check if out of stock
            if($product->stock == 0){
                toastr()->info('This product is out of stock');
                return back();
            }

            else{
                if($exist){
                    // Check requisted quantity
                    $request->quantity != null ? 
                    $exist->increment('quantity',$request->quantity) :
                    $exist->increment('quantity');
                } 
                // Product doesn't exist in panier
                else{
                    $request->quantity != null ?
                    // User requisted quantity
                    Panier::create([
                        'user_id'=>$user->id,
                        'product_id'=>$product->id,
                        'quantity'=>$request->quantity
                    ]) : 
                    // User hasn't requisted quantity
                    Panier::create([
                        'user_id'=>$user->id,
                        'product_id'=>$product->id,
                        'quantity'=>1
                    ]);
                }
                // Decrement stock
                $request->quantity != null ? 
                $product->decrement('stock', $request->quantity) :
                $product->decrement('stock');
                toastr()->success('Product has been added successfuly to the cart');
                return back();
            } 
        }
        //IF NOT AUTHENTICATE 
        else{
            toastr()->warning('You should be loged in to add an item to cart');
            return back();
        }

    }
}

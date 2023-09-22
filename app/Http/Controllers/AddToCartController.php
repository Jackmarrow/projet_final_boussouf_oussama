<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Product;
use Illuminate\Http\Request;

class AddToCartController extends Controller
{
    public function store(Product $product){

        // Check if product exist
        $exist = Panier::where('name', $product->name)->first();;

        if($exist){
            $exist->increment('quantity');
        } else{
            Panier::create([
                'image'=> $product->image,
                'name'=> $product->name,
                'price'=> $product->price,
                'quantity'=> 1,
                'total'=> $product->price,
            ]);
        }

        return back();
    }
}

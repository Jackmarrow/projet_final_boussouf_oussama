<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Panier;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AllProductController extends Controller
{
    public function index(){
        $products = Product::all();
        $categories = Category::all();
        return view('admin.pages.product', compact('products','categories'));
    }


    public function destroy(Product $product){
        $product->delete();
        return back();
    }

    public function store(Request $request){
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'=> ['required'],
            'desc'=> ['required'],
            'price'=> ['required'],
            'stock'=> ['required'],
            'category'=> ['required'],
        ]);
        
        if ($request->file('image') != null) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images/product/', $imageName);
            Product::create([
                'image'=> $imageName,
                'name'=> $request->name,
                'desc'=> $request->desc,
                'price'=> $request->price,
                'stock'=> $request->stock,
                'category_id'=> $request->category,
                'user_id'=> 1,
            ]);
        } 


        return back();
    }


    public function update(Request $request, Product $product){
        request()->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'=> ['required'],
            'desc'=> ['required'],
            'price'=> ['required'],
            'stock'=> ['required'],
            'category'=> ['required'],
        ]);

        if ($request->file('image') != null) {
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images/product', $name);
            $product->image = $name;
            $product->save();
        } 

        $product->update([
            'name'=> $request->name,
            'desc'=> $request->desc,
            'price'=> $request->price,
            'stock'=> $request->stock,
            'category'=> $request->category,
        ]);

        return back();
    }
}

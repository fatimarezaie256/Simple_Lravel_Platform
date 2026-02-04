<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDetails;
use App\Events\UserWarning;
class ProductController extends Controller
{
    //
    public function index(){
          $products = Product::with('product_details')->get();
    return view('product.home', compact('products'));
    }
    public function insert(Request $request){
        $request->validate([
            "name"=>"required|min:2|max:30",
            "price"=>"required",
            "quantity"=>"required|min:3|max:10",
            "madein"=>"required|min:2|max:30",
            "photo"=>"required|mimes:jpg,jpeg,gif,svg",
            "desc"=>"required|min:10|max:100",
        ]);
        $path = null;
        if($request->hasFile('photo')){
          $path = $request->file('photo')->store('images','public');
        }
        $product = new Product();
        $product->name = $request->name;
        $product->save();
        $proDetails = new ProductDetails();
        $proDetails->price = $request->price;
        $proDetails->description = $request->desc;
        $proDetails->quantity = $request->quantity;
        $proDetails->madeIn = $request->madein;
        $proDetails->img_url = $path;
        $proDetails->productId = $product->id;
        $proDetails->save();
        event(new UserWarning());
        return redirect('/product');


    }
}

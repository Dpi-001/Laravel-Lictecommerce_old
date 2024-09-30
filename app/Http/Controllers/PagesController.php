<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $products = Product::where('status','show')->latest()->limit(4)->get();
        // where to hide satus in home page
 return view('welcome' , compact('products'));
}

public function viewproduct($id)
{
    $product = Product::find($id);
    $relatedproducts = Product::where('status','show')->where('category_id',$product->category_id)->where('id','!=',$id)->limit(4)->get();
    return view('viewproduct',compact('product','relatedproducts'));
}
public function categoryproduct($id)
{
    $category =Category::find($id);
    $products = Product::where('status','show')->where('category_id',$id)->get();
    return view('categoryproduct' , compact('products','category'));
}
public function checkout($cart_id)
{
    $cart = Cart::find($cart_id);
    if($cart->product->discounted_price=='')
    {
        $cart->total = $cart->product->price*$cart->qty;
    }
    else
    {
        $cart->total = $cart->product->discounted_price*$cart->qty;
    }
    return view('checkout',compact('cart'));
}
}


<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $Orders = Order::latest()->get();
      return view('orders.index',compact('Orders'));

    }

    public function store(Request $request,$cartid)
    {
       $data = $request->data;
      $data = base64_decode($data);
      $data = json_decode($data);
      if($data->status =='COMPLETE')
      {
        //store order here
        $cart = Cart::find($cartid);
        $data =[
            'user_id' => $cart->user_id,
            'product_id' => $cart->product_id,
            'qty' => $cart->qty,
            'price' => $cart->product->price,
            'payment_method' => 'Esewa',
            'name' => $cart->user->name,
            'phone' =>'9876501111',
            'address' => 'KTM',
        ];
        Order::create($data);
        $cart->delete();
        return redirect(route('home'))->with('success','Order placed sucessfully');
       }
    }
    //function for cash on delivery
    public function storecod(Request $request)
    {
     $cart = Cart::find($request->cart_id);

     $data =[
        'user_id' => $cart->user_id,
        'product_id' => $cart->product_id,
        'qty' => $cart->qty,
        'price' => $cart->product->price,
        'payment_method' => 'COD',
        'name' => $cart->user->name,
        'phone' =>'9876501111',
        'address' => 'KTM',
    ];
    Order::create($data);
    $cart->delete();
    return redirect(route('home'))->with('success','Order placed sucessfully');
    }
    public function status($id,$status)
    {
$order = Order::find($id);
$order->status = $status;
$order ->save();
return back()->with('success','Updated status sucessfully');
    }
}

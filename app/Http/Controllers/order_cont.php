<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Prod;
use App\Models\OrderItem;

class order_cont extends Controller
{
    public function makeorder(Request $request,$id)
    {
      
    $userId = $request->session()->get('user_id');

   
    $userAddress = $request->session()->get('user_address');

   
    $order = Order::create([
        'user_id' => $userId,
        'total_amount' => 1, 
        'status' => 'processing',
        'address' => $userAddress,
    ]);

    OrderItem::create([
        'order_id' => $order->id,
        'product_id' => $id,
    ]);


    //return redirect()->route('orders.show', $order->id);
    return redirect(route('home'));
    }





}

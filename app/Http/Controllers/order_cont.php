<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Prod;
use App\Models\Cart;
use App\Models\OrderItem;


class order_cont extends Controller
{
    public function makeorder(Request $request,$id,$cartid)
    {
      
        $userAddress = $request->session()->get('user_address');

        return view('making_order', ['id' => $id, 'userAddress' => $userAddress , 'cartid'=>$cartid]);
    
    }

    public function makeorderall(Request $request)
    {
      
        $userAddress = $request->session()->get('user_address');

        return view('making_order_all', ['userAddress' => $userAddress ]);
    
    }
    

  public function createorder(Request $request,$id,$cartid)
    {
      
    $userId = $request->session()->get('user_id');
    
    $userAddress = $request->session()->get('user_address');

    $newAddress = $request->input('new_address');

    $productPrice = Prod::find($id)->price;

    $productQuantity = Cart::find($cartid)->amount;

    $totalamount=$productPrice*$productQuantity;

    $address = $newAddress ? $newAddress : $userAddress;
    
    $order = Order::create([
        'user_id' => $userId,
        'total_amount' => $totalamount, 
        'status' => 'processing',
        'address' => $address,
        'payment_method'=>'cash on delivery',
    ]);

    OrderItem::create([
        'order_id' => $order->id,
        'product_id' => $id,
        'quantity' => $productQuantity,
    ]);


    //return redirect()->route('orders.show', $order->id);
    return redirect(route('home'));
    
    }

    

    public function createorderall(Request $request)
{
    
    $userId = $request->session()->get('user_id');
    $userAddress = $request->session()->get('user_address');
    $payment_method='cash on delivery';
   
    $newAddress = $request->input('new_address');
    $address = $newAddress ? $newAddress : $userAddress;

    
    $cartItems = Cart::where('user_id', $userId)->get();

    
    $totalAmount = 0;

    
    $order = Order::create([
        'user_id' => $userId,
        'total_amount' => 0, // initial_total_amount (awel mara bs)
        'status' => 'processing',
        'address' => $address,
        'payment_method'=>$payment_method,
    ]);

    
    foreach ($cartItems as $cartItem) {
        $product = Prod::find($cartItem->product_id);
        $orderItemTotal = $product->price * $cartItem->amount;

        $totalAmount += $orderItemTotal;
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $cartItem->product_id,
            'quantity' => $cartItem->amount,
        ]);
    }

    $order->update(['total_amount' => $totalAmount]);

    return redirect(route('home'));
}


public function getUserOrders(Request $request)
{
    $userId = $request->session()->get('user_id');

    $orders = Order::with(['orderItems.product' => function ($query) {
        $query->select('products.*');
    }])
    ->where('user_id', $userId)
    ->get();

    return view('view_user_orders', compact('orders'));
}


 public function UserCancelOrder($id){


    $order = Order::find($id);


    if (!$order) {
    return redirect()->route('home')->with('error', 'Order not found.');
    }


     $order->update(['status' => 'cancelled']);


    return redirect()->route('home');

}
public function getAllOrdersWithUsers(Request $request)
{

    $statusFilter = $request->input('status', 'all');
    $orders = Order::with('user')->when($statusFilter !== 'all', function ($query) use ($statusFilter) {
            return $query->where('status', $statusFilter);
        })->paginate(12)->appends(['status' => $statusFilter]);


    return view('order_admin', compact('orders','statusFilter'));
}

public function changeOrderStatus($order_id, $button_name)
    {
        $order = Order::find($order_id);

        switch ($button_name) {
            case 'cancelled':
                $order->update(['status' => 'cancelled']);
                break;
            case 'delivered':
                $order->update(['status' => 'delivered']);
                break;
            case 'processing':
                $order->update(['status' => 'processing']);
                break;
        }

        return back();
    }


}

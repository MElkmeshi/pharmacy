<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\prod;
use App\Models\Cart;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use App\Models\payment_method;
use App\Models\payment_method_options;
use App\Models\payment_method_option_value;
use App\Models\options;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentMethods = payment_method::all();
        return view('new', compact('paymentMethods'));
    }
    

public function handleFormSubmission(Request $request) {
    $paymentId = (int) $request->input('payments');
    
    //$ids=payment_method_option_value::with('values')->find($hazem);

     

    $paymentMethod = payment_method::with('manypayments')->find($paymentId);
    
    $optionIds = $paymentMethod->manypayments->pluck('option_id')->toArray();
    // Join with the options table to get the names and types
    $options = options::whereIn('id', $optionIds)->get();
    return view('specific_payment', compact('paymentMethod', 'options'));

   
   
}

    public function store_values(Request $request ) {

        
        $Id = $request->session()->get('user_id');
        
       // Get all the submitted form data
        $formData = $request->except('_token');
       // $paymentMethodoptiodId = payment_method_options_value::with('values')->find($paymentId); 
   
 
    foreach ($formData as $fieldName => $value) {
        $id=1;
        payment_method_option_value::create([
            
            'paymentMethodoptionId' => $id ,
            'value' =>  $value,
            'userId' => (int)$request->session()->get('user_id'),
            
            
        ]);
   }
   
 
       $userId = $request->session()->get('user_id');
       $userAddress = $request->session()->get('user_address');
      
      
       $newAddress = $request->input('new_address');
       $address = $newAddress ? $newAddress : $userAddress;
   
       
       $cartItems = Cart::where('user_id', $userId)->get();
   
       
       $totalAmount = 0;
   
       
       $order = Order::create([
           'user_id' => $userId,
           'total_amount' => 0, // initial_total_amount (awel mara bs)
           'status' => 'processing',
           'address' => $address,
           'payment_method'=>'Vodafone Cash' ,
       ]);
   
       
       foreach ($cartItems as $cartItem) {
           $product = prod::find($cartItem->product_id);
           $orderItemTotal = $product->price * $cartItem->amount;
   
           $totalAmount += $orderItemTotal;
           OrderItem::create([
               'order_id' => $order->id,
               'product_id' => $cartItem->product_id,
               'quantity' => $cartItem->amount,
           ]);
       }
   
       $order->update(['total_amount' => $totalAmount]);
   
       $menuItems = Menu::with('children')->whereNull('parent_id')->get();

       return view('home',compact('menuItems'));
}

    
}

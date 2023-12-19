<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Prod;

class cart_cont extends Controller
{
    public function addtocart(Request $request,$id)
    {
        Cart::create([
            'user_id' =>$request->session()->get('user_id'),
            'product_id' => $id,

        ]);
        return redirect(route('displaycart'));
    }



    public function showUserCart(Request $request)
{
    $userId=$request->session()->get('user_id');
    $user = User::find($userId);

    $productsInCart = $user->carts->map(function ($cart) {
        return [
            'product' => $cart->product,
            'amount' => $cart->amount,
            'cart_id' => $cart->id,

        ];
    });

    return view('cart', ['productsInCart' => $productsInCart]);
}




// public function updateCart(Request $request, $productId)
// {
//     $userId=$request->session()->get('user_id');
//     $user = user::find($userId);


//     if ($request->has('increment')) {
//         $user->carts()->where('product_id', $productId)->increment('amount', $request->increment);
//     }

//     elseif ($request->has('decrement')) {
//         $user->carts()->where('product_id', $productId)->decrement('amount', $request->decrement);
//     }


//      return redirect()->back();

//     //return $this->showUserCart($request);
// }



public function updateCart(Request $request, $productId)
{
    //return redirect('/');

    $userId = $request->session()->get('user_id');
    $user = User::find($userId);

    if ($request->has('increment')) {
        $user->carts()->where('product_id', $productId)->increment('amount', $request->increment);
    } elseif ($request->has('decrement')) {
        $user->carts()->where('product_id', $productId)->decrement('amount', $request->decrement);
    }
    $updatedData = $user->carts()
    ->where('product_id', $productId)
    ->select('amount', 'product_id')
    ->with('product:id,price')
    ->first();

    // Retrieve the updated amount and return it as JSON
    //$updatedAmount = $user->carts()->where('product_id', $productId)->value('amount');

    //return response()->json(['amount' => $updatedAmount]);
    $totalPrice = $updatedData->amount * $updatedData->product->price;
    
    return response()->json(['amount' => $updatedData->amount, 'price' => $updatedData->product->price, 'total_price' => $totalPrice]);
}





public function deletecart(Request $request,$id)
{

    $cart = Cart::find($id);

    if (!$cart) {

        return redirect('/')->with('error', 'cart not found.');
    }


    $cart->delete();

   //return $this->showUserCart($request);
   return redirect()->back();
}




}

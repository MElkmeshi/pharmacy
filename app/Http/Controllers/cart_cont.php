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
        return redirect('/');
    }
    
 



}

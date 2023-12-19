<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use App\Models\payment_method;
use App\Models\payment_method_options;
use App\Models\payment_method_option_value;
use App\Models\options;
use Illuminate\Http\Request;

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

    public function store_values(Request $request)
    {

        
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
   $menuItems = Menu::with('children')->whereNull('parent_id')->get();

    return view('home',compact('menuItems'));
    }


  
}

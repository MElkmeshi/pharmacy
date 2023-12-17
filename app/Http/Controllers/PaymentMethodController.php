<?php

namespace App\Http\Controllers;


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
    //echo $paymentId;
   // $hazem=1;
    //$ids=payment_method_option_value::with('values')->find($hazem);

    $paymentMethod = payment_method::with('manypayments')->find($paymentId);
    $optionIds = $paymentMethod->manypayments->pluck('option_id')->toArray();
    // Join with the options table to get the names and types
    $options = options::whereIn('id', $optionIds)->get();
    return view('specific_payment', compact('paymentMethod', 'options'));

   // var_dump($paymentId);
    //echo $paymentMethod;
   
}

    public function store_values(Request $request)
    {


        //$options=$ids;

       // var_dump($options);

       
        $Id = $request->session()->get('user_id');
        
       // Get all the submitted form data
        $formData = $request->except('_token');
       // $paymentMethodoptiodId = payment_method_options_value::with('values')->find($paymentId); 
   
    foreach ($formData as $fieldName => $value) {
      echo $Id;
      echo $fieldName . ': ' . $value . '<br>';
    }
    foreach ($formData as $fieldName => $value) {
        $id=1;
        payment_method_option_value::create([
            
            'paymentMethodoptionId' => $id ,
            'value' =>  $value,
            'userId' => (int)$request->session()->get('user_id'),
            
            
        ]);
   }

    return view('testpayment', compact('formData'));
    }


  
}

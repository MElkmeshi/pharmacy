<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use App\Models\payment_method;
use App\Models\payment_method_options;
use App\Models\payment_method_options_value;
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
        $payment_method_options=payment_method_options::all();
        $options = options::all();
        return view('new', compact('options'));
    }

    public function store(Request $request)
    {
        $paymentMethod = PaymentMethod::create($request->all());
        $paymentMethod->manypayments()->attach($request->input('options')); // Assuming options is an array of option ids
        return redirect()->route('payment_methods.index');
    }

  
}

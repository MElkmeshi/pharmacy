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

    public function create()
    {
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

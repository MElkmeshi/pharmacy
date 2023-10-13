<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Import the Hash facade

class user_cont extends Controller
{
  

    public function store(Request $request)
    {
        user::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
            'address'=>$request->address,
            'age'=>$request->age,
            'role'=>$request->role,

            
        ]);
        return redirect('/');
    }

   
}

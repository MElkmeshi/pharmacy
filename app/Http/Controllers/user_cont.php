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


    public function login(Request $request)
{
  
    
    // // Retrieve user session data
    // $userId = $request->session()->get('user_id');
    // $userName = $request->session()->get('user_name');

    $email = $request->input('email');
    $password = $request->input('password');

    // Find a user with the given email
    $user = user::where('email', $email)->first();

    if ($user && Hash::check($password, $user->password)) {
        // Password matches the stored password
        // Authentication passed...
        
    $request->session()->put('user_id', $user->id);
    $request->session()->put('user_name', $user->name);

       return redirect('/');
   
    }

    
}

   
}

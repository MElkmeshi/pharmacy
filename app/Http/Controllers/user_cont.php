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
        
    $request->session()->put('user_email', $user->email);
    $request->session()->put('user_address', $user->address);
    $request->session()->put('user_age', $user->age);
    $request->session()->put('user_password', $user->password);



       return redirect('/');
   
    }
    else{
        return redirect('/loginform');
    }

    
}


public function show_updateuser_form(Request $request){

    $userEmail = $request->session()->get('user_email');
    $userAddress = $request->session()->get('user_address');
    $userAge = $request->session()->get('user_age');
    $username = $request->session()->get('user_name');
    $userpassword=$request->session()->get('user_password');

    return view('updateuser', [
        'userEmail' => $userEmail,
        'userAddress' => $userAddress,
        'userAge' => $userAge,
        'userName' => $username,
        'userPassword'=>$userpassword,
    ]);

}


public function updateuser(Request $request){
    $name = $request->input('name');
    $address = $request->input('address');
    $age = $request->input('age');

    $password = $request->input('password');
    $userId = $request->session()->get('user_id');

   
    $user = user::find($userId);

   
    $user->name = $name;
   
    
    if (!empty($password)) {
        if (Hash::needsRehash($password)) {
            $user->password = Hash::make($password);
        } else {
            $user->password = $password;
        }
    }
    
    $user->address = $address;
    $user->age = $age;

    
    $user->save();

    return redirect('/');
}





public function deleteuser(Request $request){
   
    $emailToDelete = $request->input('email');

    
    $userToDelete = user::where('email', $emailToDelete)->first();

    if ($userToDelete) {
        
        $userToDelete->delete();
        return redirect('/');
    } else {
        
        return redirect('/deleteuserform')->with('error', 'User not found');
    }
}


   
}

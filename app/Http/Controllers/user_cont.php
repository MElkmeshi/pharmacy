<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Import the Hash facade
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Spatie\Permission\Contracts\Role;

class user_cont extends Controller
{


    public function store(CreateUserRequest $request)
    {
        $newuser = user::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
            'address'=>$request->address,
            'age'=>$request->age,
        ]);
        return redirect('/');
    }
    public function logout(Request $request,)
    {
        $request->session()->flush();
        return redirect(route('home'));
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
    $request->session()->put('user_role', $user->role);


       return redirect(route('home'));
    }
    else{
        return back()->with('error','Wrong email or password');
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

public function admin_show_updateuser_form(Request $request,$id){

    $user = user::find($id);
    if (!$user) {

        return redirect('/')->with('error', 'Product not found.');
    }
    else


    return view('adminupdateuser', compact('user'));

}
public function admin_updateuser(Request $request, $id){
    $name = $request->input('name');
    $address = $request->input('address');
    $age = $request->input('age');
    $role = $request->input('user_role');
    $user = user::find( $id );
    $user->name = $name;
    $user->address = $address;
    $user->age = $age;
    $user->role = $role;
    $user->save();
    $userId = $request->session()->get('user_id');
    if( $user->id == $userId ){
        $request->session()->put('user_name', $user->name);
        $request->session()->put('user_email', $user->email);
        $request->session()->put('user_address', $user->address);
        $request->session()->put('user_age', $user->age);
        $request->session()->put('user_role', $user->role);
    }
    return redirect(route('dash'));

}
public function isUniqueEmail(Request $request,$email){

    $user = user::where('email',urldecode($email) )->get();
    return $user->count() == 0 ? 'true' : 'false';
}



public function updateuser(UpdateUserRequest $request){
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
    $request->session()->put('user_name', $user->name);
    $request->session()->put('user_email', $user->email);
    $request->session()->put('user_address', $user->address);
    $request->session()->put('user_age', $user->age);
    $request->session()->put('user_role', $user->role);
    return redirect('/');
}





public function deleteuser(Request $request){

    $emailToDelete = $request->input('email');


    $userToDelete = user::where('email', $emailToDelete)->first();

    if ($userToDelete) {

        $userToDelete->delete();
        return redirect(route('dash'));
    } else {

        return redirect('/deleteuserform')->with('error', 'User not found');
    }
}


public function disusers(){

    $users = user::get();
    //\App\Models\prod::select('id', 'name', 'desciption', 'price','image')->get();

   // Pass the retrieved data to the "home" view
   return view('dis_users',compact('users') );
  // ['products' => $products]
   }


}

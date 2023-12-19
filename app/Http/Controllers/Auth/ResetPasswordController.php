<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Password;
use App\Models\UserToken;
use Illuminate\Support\Carbon;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class ResetPasswordController extends Controller
{
  

    public function resetWithToken(Request $request)
    {
       
        $request->validate([
            'token' => 'required|string',
            'newpassword' => 'required|string|min:8',
        ]);

        $token = $request->input('token');
        $newPassword = $request->input('newpassword');

        $userToken = UserToken::where('token', $token)->first();

        if (!$userToken) {
            return response()->json(['message' => 'Token not found.'], 404);
        }

        $createdAt = Carbon::parse($userToken->created_at);
        $now = Carbon::now();

        if ($createdAt->diffInHours($now) > 12) {
            return response()->json(['message' => 'Token expired.'], 422);
        }

       $hashed = Hash::make($newPassword);

       $user = $userToken->user;
        $user->update([
            'password' => $hashed, 
        ]);

        
        $userToken->delete();

        
        return view('home');
    }

}

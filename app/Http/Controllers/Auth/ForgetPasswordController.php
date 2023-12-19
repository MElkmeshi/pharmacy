<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Contracts\ForgetPasswordInterface;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    // public function showLinkRequestForm()
    // {
    //     return view('auth.passwords.email');
    // }

    // public function sendResetLinkEmail(Request $request)
    // {
    //     $request->validate(['email' => 'required|email']);

    //     $status = Password::sendResetLink(
    //         $request->only('email')
    //     );

    //     return $status === Password::RESET_LINK_SENT
    //                 ? back()->with(['status' => __($status)])
    //                 : back()->withErrors(['email' => __($status)]);
    // }


    private $forgetPasswordService;

    public function __construct(ForgetPasswordInterface $forgetPasswordService)
    {
        $this->forgetPasswordService = $forgetPasswordService;
    }

    public function sendResetLink(User $user)
    {
        $token = 'generate_your_token_here';

        $result = $this->forgetPasswordService->sendlink($user, $token);

        return view('forget-password', compact('result'));
    }
}
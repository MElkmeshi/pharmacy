<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Contracts\ForgetPasswordInterface;
use App\Models\User;
use App\Services\EmailImplementation;
use App\Services\SmsImplementation;
use App\Services\WhatsAppImplementation;

class ForgetPasswordController extends Controller
{


    private $forgetPasswordService;

    // public function __construct(Request $request)
    // {
    //     $request->validate([
    //         'channel' => 'required|in:email,sms,whatsapp',
    //     ]);

    //     // Choose the implementation based on the communication channel
    //     switch ($request->channel) {
    //         case 'email':
    //             $this->forgetPasswordService = app(EmailImplementation::class);
    //             break;
    //         case 'sms':
    //             $this->forgetPasswordService = app(SmsImplementation::class);
    //             break;
    //         case 'whatsapp':
    //             $this->forgetPasswordService = app(WhatsAppImplementation::class);
    //             break;
    //         default:
    //             throw new \InvalidArgumentException('Invalid communication channel.');
    //     }
    // }


    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'channel' => 'required|in:email,sms,whatsapp',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => __('We cannot find a user with that email address.')]);
        }

        $token = Password::getRepository()->create($user);

        $user->userToken()->create([
            'token' => $token,
        ]);


        // Choose the communication channel dynamically
        switch ($request->channel) {
            case 'email':
                error_log("hi2");
                $this->forgetPasswordService = app(EmailImplementation::class);
                $result = $this->forgetPasswordService->sendlink($user->email, $token);
                case 'sms':
                // Get user's phone number and send SMS
                $phoneNumber = $user->phone; // Adjust the column name as per your User model
                $this->forgetPasswordService = app(SmsImplementation::class);
                $result = $this->forgetPasswordService->sendlink($phoneNumber, $token);
                break;
            case 'whatsapp':
                // Get user's phone number and send WhatsApp message
                $phoneNumber = $user->phone; // Adjust the column name as per your User model
                $this->forgetPasswordService = app(WhatsAppImplementation::class);
                $result = $this->forgetPasswordService->sendlink($phoneNumber, $token);
                break;
            default:
                return back()->withErrors(['channel' => __('Invalid communication channel.')]);
        }
        return view('newpassword');
    }


}

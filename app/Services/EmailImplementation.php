<?php

namespace App\Services;

use App\Contracts\ForgetPasswordInterface;

class EmailImplementation implements ForgetPasswordInterface
{
    public function sendlink($user, $token)
    {
        // Logic for sending forget password link via Email
        return "Sending forget password link via Email to {$user->email}";
    }
}
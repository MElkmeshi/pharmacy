<?php

namespace App\Services;

use App\Contracts\ForgetPasswordInterface;

class SmsImplementation implements ForgetPasswordInterface
{
    public function sendlink($user, $token)
    {
        return "Second Implementation";
    }
}

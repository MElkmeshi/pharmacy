<?php

namespace App\Services;

use App\Contracts\ForgetPasswordInterface;

class WhatsAppImplementation implements ForgetPasswordInterface
{
    public function sendlink($user, $token)
    {
        return "First Implementation";
    }
}
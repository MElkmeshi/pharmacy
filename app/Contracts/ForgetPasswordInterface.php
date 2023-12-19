<?php
namespace App\Contracts;

interface ForgetPasswordInterface
{
    public function sendlink($useremail, $token);
    
}

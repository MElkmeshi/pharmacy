<?php
namespace App\Contracts;

interface ForgetPasswordInterface
{
    public function sendlink($user, $token);

}

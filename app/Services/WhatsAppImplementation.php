<?php

namespace App\Services;

use App\Contracts\ForgetPasswordInterface;
use App\Models\UserToken;
use Illuminate\Support\Carbon;

class WhatsAppImplementation implements ForgetPasswordInterface
{
    public function sendlink($phoneNumber, $token)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://arkanly-12d20baff04d.herokuapp.com',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
           "username":"arkan",
          "phoneNumber":"'.$phoneNumber.'",
          "message":"'.$token.'"
         }',
      CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json'
     ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

return $response;


        
    }

    
}
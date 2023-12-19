<?php

namespace App\Services;

use App\Contracts\ForgetPasswordInterface;
use App\Models\UserToken;
use Illuminate\Support\Carbon;

class SmsImplementation implements ForgetPasswordInterface
{
    public function sendlink($phoneNumber, $token)
    {


        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://llamalab.com/automate/cloud/message',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
          "secret": "2.yW6KsAAdgttEYOFjKoLmfy-sOZIFdw4tVuX87DSKBFk",
          "to": "elkmeshi2002@gmail.com",
          "device": "SAMSUNG SM-S911B",
          "priority": "high",
          "payload": ["'.$phoneNumber.'","'.$token.'"]
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

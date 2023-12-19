<?php

namespace App\Services;

use App\Contracts\ForgetPasswordInterface;
use App\Models\UserToken;
use Illuminate\Support\Carbon;

class EmailImplementation implements ForgetPasswordInterface
{
    public function sendlink($userEmail, $token)
    {
        

      $curl = curl_init();

      curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://prod-07.westeurope.logic.azure.com:443/workflows/2af3a79cd0fc45b9a276bf8c291523ed/triggers/manual/paths/invoke?api-version=2016-06-01&sp=%2Ftriggers%2Fmanual%2Frun&sv=1.0&sig=XvbU_7unFyjkQQDGe5EuPU7H_ygknt82nCWRQ5ilXJU',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
      "to":"' . $userEmail . '",
      "subject":"subj",
      "message": "'.$token.'"
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
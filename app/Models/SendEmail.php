<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendEmail extends Model
{
    static function Send($email,$name,$subject,$content){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.brevo.com/v3/smtp/email',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{  
        "sender":{  
            "name":"Reiky De Manto",
            "email":"reikydemanto@gmail.com"
        },
        "to":[  
            {  
                "email":"'.$email.'",
                "name":"'.$name.'"
            }
        ],
        "subject":"'.$subject.'",
        "htmlContent":"<html><head></head><body><p>'.$content.'</p></body></html>"
        }',
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'api-key: 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',
            'Content-Type: application/json',
            'Cookie: __cf_bm=ze4P4c2VmLMoJv_FGJrq9Pp3vpZCZwslgty1GTzIpPo-1707281287-1-AZ1iny4K0i1abH4cvDUiy0NRHl3aUTN4bDiYfD2AiVbkjSgRf8IK99ylKWkPZYxQVe2CfUxaA5VGweN+ezL8NOc='
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }
}

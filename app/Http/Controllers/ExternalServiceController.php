<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
class ExternalServiceController extends Controller
{
    private static $smsUrl = 'https://sms.mehnat.uz/serve';
    private static $resourceUrl = 'https://resource1.mehnat.uz/services';
    private static $enst_url = 'https://newapi.mehnat.uz/api/v1/';
    private static $daftar_url = 'https://newapi.mehnat.uz/api/v1/';




    public function getSoliqPerson($passport)
    {

        ini_set('max_execution_time', 2);
        $data = [
            'version' => '1.0',
            'id' => '12323',
            'method' => 'soliq.person.passport',
            'params' => [
                'passport' => $passport
            ]
        ];

        return self::makeRequest($data);

    }

    public static function getIpsPersonData($passport, $pin)
    {
        $data = [
            'version' => '1.0',
            'id' => '7436',
            'method' => 'ips.person',
            'params' => [
                'passport' => $passport,
                'pin' => $pin
            ]
        ];

        return self::makeRequest($data);

    }

    public static function getSocialProtection($pin)
    {
        $data = [
            'version' => '1.0',
            'id' => '122323',
            'method' => 'minfin.socialProtection.pin',
            'params' => [
                'pin' => $pin
            ]
        ];

        return self::makeRequest($data);

    }


    public static function makeRequest($data, $url = null)
    {

        if(!$url){
            $url = self::$resourceUrl;
        }


        $client = new Client(['verify' => false ]);

        try {
            $response_by_passport = $client->post('https://resource1.mehnat.uz/services', [
                'json' => $data
            ]);
            $result = json_decode((string)$response_by_passport->getBody(), true);
//            dd($result);
            if($result['result']){
                return $result;

            } else{
                return $result =null;
            }
        } catch (\Exception $e){
            return null;
        }
    }
}

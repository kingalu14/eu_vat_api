<?php

namespace App\Http\Controllers\Consumer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class VatValidationContoller extends Controller
{

    public function index(){
        return view('consumer.index');
      }
    
    public function validateVat(Request $request)
    {
       
        $token = "32lWxkUMalCPYkSyP2mSrVOzMOcjeKJ2lK4SX49OmKSHGEwcapFLPG6SvPms";
        $client = new Client([
            'base_uri' => 'http://euvat.test',
            'defaults' => [
                'exceptions' => false
            ]
        ]);
    
        $response = $client->request('POST','/api/v1/vat/vat-validation', [
            'form_params' => [
                'countryCode' => $request->countryCode,
                'vatNumber' => $request->vatNumber,
                'api_token' => $token,
            ],
            'query' => [
                //'api_token' => $token,
            ],
            'headers' => [
                'Authorization' => 'Bearer '.$token,
                'Accept' => 'application/json',
            ],
        ]);
      
        $response = $response->getBody()->getContents();
        return view('consumer.index',['response'=>json_decode($response)]);
    
    }
}

<?php

namespace App\Http\Controllers\Soap;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Soap\BaseSoap;
use App\Repository\Soap\InstanceSoapClient;
use App\jobs\RequestQueue;
use App\Repository\Vat\VatInformationRepository;
use Illuminate\Support\Facades\Auth;
use Log;

class EuropeVatController extends Controller
{
    private $service;
    private $vatInformation;


    public function __construct(VatInformationRepository $vatInformation) {
        $this->vatInformation = $vatInformation;
        try {
            BaseSoap::setWsdl('http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl');
            $this->service = InstanceSoapClient::init();
        }
        catch(\Exception $e) {
            Log::Info("Connection Eror:".$e->getMessage());
            return $e->getMessage();
        }

    }

    public function validateVat(Request $request){
      
        $countryCode = $request->countryCode;
        $vatNumber = $request->vatNumber; 
        $date = date("Y-m-d H:i:s");
        Log::Info("Request Date:".$date." "."countryCode:".$countryCode." "."vatNumber:".$vatNumber);
    
        try {
            $params = [
                'countryCode' => request()->input('countryCode') ? request()->input('countryCode') : $this->countryCode,
                'vatNumber'   => request()->input('vatNumber') ? request()->input('vatNumber') :  $this->vatNumber
            ];
            
            $result = serialize($this->service->checkVat($params));
            $data['details'] = $result; 
            $data['api_token'] = $request->api_token;

            Log::Info("api_token:".$request->api_token);
       
            $this->dispatch(new RequestQueue($this->vatInformation,$data)); 
            $result=unserialize($result);
            return json_encode($result);
            
        }
        catch(\Exception $e) {
            Log::Info("Validation Eror:".$e->getMessage());
            return $e->getMessage();
        }  
       
    }


      
}

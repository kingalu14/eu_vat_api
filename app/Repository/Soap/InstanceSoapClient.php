<?php

namespace App\Repository\Soap;
use SoapClient;

class InstanceSoapClient extends BaseSoap implements InterfaceInstanceSoap{

    /**
     * define initilization of our service
     */
    public static function init(){
         $wsdlUrl = self::getWsdl();
         $soapClientOptions = [
             'stream_context' =>self::generateContext(),
             'cache_wsdl' => WSDL_CACHE_NONE
         ];
         return new SoapClient($wsdlUrl,$soapClientOptions);
    }
}
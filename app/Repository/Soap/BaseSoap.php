<?php
namespace App\Repository\Soap;


class BaseSoap  {
  protected static $options;
  protected static $context;
  protected static $wsdl;

 public static function setWsdl($service){
   return self::$wsdl=$service;
 }

 public static function getWsdl(){
    return self::$wsdl;
  }

  /**
   * we generate context that will go in our header
   */
  public static function generateContext(){
    return self::$options = [
        'http'=> [
            'user_agent'=>'PHPSoapClient'
        ]
    ];
    return self::$context = stream_context_create(self::$options);
  }


  public static function loadXmlStringAsArray($xmlString){
       $array = (array) @simplexml_load_string($xmlString);
       if(!$array)
           $array = (array)@json_decode($xmlString,true);
       else
           $array = (array)@json_decode(json_encode($array),true); 
       return  $array;
  }

}
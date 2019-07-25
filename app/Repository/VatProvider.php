<?php

/**
 * @author  Kassim Kingalu<kingkessy18@yahoo.co.uk>
*/
namespace App\Repository;

interface VatProvider{
   public function getApiUrl();
   public function getResource($vatNumber, string $countryCode);
}
<?php
namespace App\Repository\Vat;
use App\VatInformation;
use App\Decorator\Eloquent;

class EloquentVatInformation implements VatInformationRepository
{
    protected $model;
    protected $vatInformation;

    public function __construct(VatInformation $model)
    {
        $this->vatInformation = new Eloquent(new VatInformation);
        $this->model = $model;   
    }

    public function  getVatInformation(){
        return $this->vatInformation;
    }
}

<?php
namespace App\Repository\Archieve;
use App\Archieve;
use App\Decorator\Eloquent;

class EloquentArchieve implements ArchieveRepository
{
    protected $model;
    protected $vatDataArchieve;

    public function __construct(Archieve $model)
    {
        $this->vatDataArchieve = new Eloquent(new Archieve);
        $this->model = $model;   
    }

    public function  getVatDataArchieve(){
        return $this->vatDataArchieve;
    }
}

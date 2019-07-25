<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VatInformation extends Model
{
    protected $table = 'vat_informations';
    protected $fillable = ['details','api_token'];

    public function getDetailsAttribute($value){
      return unserialize($value);
    }


}

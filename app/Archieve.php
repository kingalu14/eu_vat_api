<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archieve extends Model
{
    protected $table = 'archieves';
    protected $fillable = [
      'user_id','details','id','created_at','updated_at'
    ];

}

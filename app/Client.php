<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['ref','name','email','adress','postcode','city','tva','country_id','phone','fax'];
}

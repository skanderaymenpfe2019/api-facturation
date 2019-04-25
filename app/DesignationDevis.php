<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesignationDevis extends Model
{
    protected $fillable = ['id','quotation_id','designation','unit_price','tva','qty','unit_id','categpry_id'];
}

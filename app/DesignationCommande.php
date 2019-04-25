<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesignationCommande extends Model
{
    protected $fillable = ['id','command_id','designation','unit_price','tva','qty','unit_id','categpry_id'];
}

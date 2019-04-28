<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesignationFacture extends Model
{
    protected $fillable = ['id','invoice_id','designation','unit_price','tva','qty','unit_id','category_id','devise_converted','taux_exchange'];
}

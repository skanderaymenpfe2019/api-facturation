<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $fillable=['id','client_id','ref','regulation','remark','date','date_deadline','ref_client','name','email','address','postcode','city','tva_client','country_id','phone','fax','payment_mode','invoiced','status','currency_id'];
}

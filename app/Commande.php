<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = ['id','client_id','ref','regulation','remark','date','date_deadline','ref_client','name','email','adress','postcode','city','tva_client','country_id','phone','fax','payment_mode','total_price','advance','invoiced','status','currency_id'];
}

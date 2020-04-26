<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
    	'purchase_date' ,'product_id','customer_id','alert_date','service_date','note','status'
    ];
}

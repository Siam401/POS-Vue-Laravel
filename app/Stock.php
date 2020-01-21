<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $hidden = [
        'name','getprice', 'sellprice','quantity','categoryid','companyid','barcode'
    ];
}

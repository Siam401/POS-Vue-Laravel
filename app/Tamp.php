<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tamp extends Model
{
    protected $fillable = [
        'stockid','name','getprice', 'sellprice','quantity','maxquantity','categoryid','companyid','barcode'
    ];
}

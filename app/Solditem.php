<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solditem extends Model
{
    protected $hidden = [
        'billno', 'quantity','peritemprice','discount','paymenttype','barcode','categoryid'
    ];
}

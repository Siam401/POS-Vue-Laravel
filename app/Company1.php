<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company1 extends Model
{
    protected $hidden = [
        'name','phone','address'
    ];
}

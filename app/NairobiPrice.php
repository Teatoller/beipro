<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NairobiPrice extends Model
{
    protected $fillable = [
        'marketer_name',
        'diesel_price',
        'petrol_price',
        'kerosene_price',
        'ido_price',
        'fuel oil',
        'fo_price',
        'lpg_price',
    ];
}

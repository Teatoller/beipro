<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NairobiPrice extends Model
{
    //
    protected $fillable = [
        'marketer_name',
        'diesel',
        'diesel_price',
        'petrol',
        'petrol_price',
        'kerosene',
        'kerosene_price',
        'ido',
        'ido_price',
        'fo',
        'fo_price',
        'lpg',
        'lpg_price',
    ];
}

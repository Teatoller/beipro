<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrentPrice extends Model
{
    protected $fillable = [
        'diesel',
        'petrol',
        'kerosene',
        'ido',
        'fo',
        'lpg',
    ];
}

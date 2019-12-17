<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrontOffice extends Model
{
    protected $fillable = [
        'name',
        'location',
    ];

    /**
     * Get the current prices for the front office.
     */
    public function currentPrices()
    {
        return $this->hasMany('App\CurrentPrice');
    }
}

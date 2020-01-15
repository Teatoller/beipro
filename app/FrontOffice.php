<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrontOffice extends Model
{
    protected $fillable = [
        'name',
        'code',
        'location',
        'company_id',
    ];

    /**
     * Get the company that owns the front office.
     */
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    /**
     * Get the current prices for the front office.
     */
    public function currentPrices()
    {
        return $this->hasMany('App\CurrentPrice');
    }
}

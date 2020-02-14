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
     * Get the beipro super admin that manages the front offices.
     */
    public function superAdmins()
    {
        return $this->belongsTo('App\SuperAdmin');
    }

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

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
        'front_office_id',
    ];

    /**
     * Get the front office that owns the current price.
     */
    public function frontOffice()
    {
        return $this->belongsTo('App\FrontOffice');
    }
}

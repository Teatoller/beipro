<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class FrontOffice extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

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

    /**
     * {@inheritdoc}
     */
    public function generateTags(): array
    {
        return [
            $this->name,
        ];
    }
}

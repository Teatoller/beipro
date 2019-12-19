<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyAdmin extends Model
{
    protected $fillable = [
        'company_id',
        'admin_id',
        'is_master',
        'firstname',
        'lastname',
        'staff_id',
        'email',
        'password',
        'location_code',
    ];

    /**
     * Get the company that owns the company admin.
     */
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    /**
     * Get the admin that manages the company admins.
     */
    public function admins()
    {
        return $this->belongsTo('App\Admin');
    }

}

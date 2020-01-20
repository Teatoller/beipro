<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'company_id',
        'firstname',
        'lastname',
        'email',
        'role',
    ];

    /**
     * Get the Admin that owns or manages the company admins.
     */
    public function companyAdmins()
    {
        return $this->hasMany('App\CompanyAdmin');
    }
}

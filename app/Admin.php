<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Admin extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'company_id',
        'firstname',
        'lastname',
        'email',
        'role',
    ];

    /**
     * Get the beipro super admin that manages the admins.
     */
    public function superAdmins()
    {
        return $this->belongsTo('App\SuperAdmin');
    }

    /**
     * Get the company that owns the Admin.
     */
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    /**
     * Get the Admin that owns or manages the company admins.
     */
    public function companyAdmins()
    {
        return $this->hasMany('App\CompanyAdmin');
    }
    
    /**
     * {@inheritdoc}
     */
    public function generateTags(): array
    {
        return [
            $this->company_id,
        ];
    }
}

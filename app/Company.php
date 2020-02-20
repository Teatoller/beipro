<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Company extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'name',
        'logo',
        'description',
        'location',
        'established',
        'country',
    ];

    /**
     * Get the beipro super admin that manages the company.
     */
    public function superAdmins()
    {
        return $this->belongsTo('App\SuperAdmin');
    }

    /**
     * Get the front offices for the company.
     */
    public function frontOffices()
    {
        return $this->hasMany('App\FrontOffice');
    }

    /**
     * Get the company Admins for the company.
     */
    public function admins()
    {
        return $this->hasMany('App\Admin');
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

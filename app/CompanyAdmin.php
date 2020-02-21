<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class CompanyAdmin extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'admin_id',
        'front_office_id',
        'firstname',
        'lastname',
        'staff_id',
        'email',
        'role',
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

    /**
     * {@inheritdoc}
     */
    public function generateTags(): array
    {
        return [
            $this->front_office_id,
            $this->admin_id,
        ];
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class CurrentPrice extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

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

    /**
     * {@inheritdoc}
     */
    public function generateTags(): array
    {
        return [
            $this->front_office_id,
        ];
    }
}

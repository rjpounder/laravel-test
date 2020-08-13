<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Address
 * @package App
 */
class Address extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'contact_id',
        'address_line_1',
        'address_line_2',
        'city',
        'town',
        'country'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Address
 *
 * @package App
 * @property int $id
 * @property string $name
 * @property int $contact_id
 * @property string $address_line_1
 * @property string|null $address_line_2
 * @property string|null $city
 * @property string $town
 * @property string $country
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Contact $contact
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereAddressLine1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereAddressLine2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereTown($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $zip_code
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereZipCode($value)
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
        'zip_code',
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

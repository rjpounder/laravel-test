<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ContactRole
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Contact[] $contacts
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactRole query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactRole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactRole whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContactRole whereUpdatedAt($value)
 * @property-read int|null $contacts_count
 */
class ContactRole extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CompanyType
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Company[] $companies
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CompanyType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CompanyType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CompanyType query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CompanyType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CompanyType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CompanyType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CompanyType whereUpdatedAt($value)
 * @property-read int|null $companies_count
 */
class CompanyType extends Model
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function companies()
    {
        return $this->hasMany(Company::class);
    }

}

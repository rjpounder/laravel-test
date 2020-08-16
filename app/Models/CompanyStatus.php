<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CompanyStatus
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Company[] $companies
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CompanyStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CompanyStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CompanyStatus query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CompanyStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CompanyStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CompanyStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CompanyStatus whereUpdatedAt($value)
 * @property-read int|null $companies_count
 */
class CompanyStatus extends Model
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

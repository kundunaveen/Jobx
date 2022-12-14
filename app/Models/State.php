<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    use HasFactory;

    protected $table = 'states';
    protected $fillable = [
        'name',
        'country_id',
        'country_code',
        'fips_code',
        'iso2',
        'type',
        'latitude',
        'longitude',
        'flag',
        'wikiDataId'
    ];

    public function country()
    {
        return $this->belongsTo('App\Models\Country', 'country_id');
    }

    public function cities()
    {
        return $this->hasMany('App\Models\City', 'state_id');
    }

    public function vacancies(): HasMany{
        return $this->hasMany(Vacancy::class, 'state');
    }
}

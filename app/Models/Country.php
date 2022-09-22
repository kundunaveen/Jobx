<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';
    protected $fillable = [
        'name',
        'iso3',
        'numeric_code',
        'code',
        'dial_code',
        'capital',
        'currency',
        'currency_name',
        'currency_symbol',
        'tld',
        'native',
        'region',
        'subregion',
        'timezones',
        'translations',
        'latitude',
        'longitude',
        'emoji',
        'emojiU',
        'flag',
        'wikiDataId'
    ];

    public function states()
    {
        return $this->hasMany('App\Models\State', 'country_id');
    }

    public function cities()
    {
        return $this->hasMany('App\Models\City', 'country_id');
    }
}

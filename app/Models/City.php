<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;
    protected $table = 'cities';
    protected $fillable = [
        'city',
        'country_id',
        'state_id',
        'state_code',
        'country_code',
        'latitude',
        'longitude',
        'flag',
        'wikiDataId'
    ];

    public function country()
    {
        return $this->belongsTo('App\Models\Country', 'country_id');
    }

    public function state()
    {
        return $this->belongsTo('App\Models\State', 'state_id');
    }

    public function vacancies():HasMany{
        return $this->hasMany(Vacancy::class, 'city');
    }
}

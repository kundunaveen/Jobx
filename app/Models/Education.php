<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'user_id',
        
        'qualification',
        'institution_name',

        'country_id',
        'state_id',
        'city_id',

        'from_month',
        'from_year',
        'to_month',
        'to_year',

        'is_pursuing_here',

        'describe',
    ];

    public function user() :BelongsTo{
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function country(): BelongsTo{
        return $this->belongsTo(Country::class);
    }

    public function state(): BelongsTo{
        return $this->belongsTo(State::class);
    }

    public function city(): BelongsTo{
        return $this->belongsTo(City::class);
    }
}

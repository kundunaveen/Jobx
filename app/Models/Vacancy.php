<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'job_title',
        'city',
        'country',
        'state',
        'location',
        'zip',
        'department',
        'job_role',
        'description',
        'salary_offer',
        'min_exp',
        'skills',
        'job_type'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'employer_id');
    }

    public function countrydetail()
    {
        return $this->belongsTo('App\Models\Country', 'country');
    }

    public function statedetail()
    {
        return $this->belongsTo('App\Models\State', 'state');
    }

    public function citydetail()
    {
        return $this->belongsTo('App\Models\City', 'city');
    }
}

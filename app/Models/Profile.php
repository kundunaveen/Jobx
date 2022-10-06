<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'gender',
        'age',
        'experience',
        'current_salary',
        'expected_salary',
        'languages',
        'company_name',
        'industry_type_id',
        'description',
        'logo',
        'intro_video',
        'resume',
        'address',
        'city',
        'state',
        'country',
        'zip',
        'skills',
        'company_size',
        'company_role',
        'notification_option',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}

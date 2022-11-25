<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppliedJob extends Model
{
    use HasFactory;
    protected $table = 'applied_jobs';
    protected $fillable = [
        'user_id',
        'vacancy_id',
        'status',
    ];

    public CONST STATUS_IN_REVIEW = 0;
    public CONST STATUS_SHORTLISTED = 1;
    public CONST STATUS_REJECTED = 2;
    public CONST STATUS_HIRED = 3;
    public CONST STATUS_HOLD = 4;

    public CONST STATUS_ARRAY = [
        self::STATUS_IN_REVIEW => 'In Review',
        self::STATUS_SHORTLISTED => 'Shortlisted',
        self::STATUS_REJECTED => 'Rejected',
        self::STATUS_HIRED => 'Hired',
        self::STATUS_HOLD => 'Hold',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    } 
    public function vacancy()
    {
        return $this->belongsTo('App\Models\Vacancy', 'vacancy_id');
    } 
}

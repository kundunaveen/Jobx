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
        'vacancy_id'
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSkill extends Model
{
    use HasFactory;

    protected $fillable = [
        'industry_id',
        'skill'
    ];

    public function industry()
    {
        return $this->belongsTo('App\Models\MasterAttribute','industry_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterAttribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'master_attribute_category_id',
        'value'
    ];

    public function masterCategory()
    {
        return $this->belongsTo('App\Models\MasterAttributeCategory', 'master_attribute_category_id');
    }

    public function skills()
    {
        return $this->hasMany('App\Models\JobSkill', 'industry_id');
    }
}

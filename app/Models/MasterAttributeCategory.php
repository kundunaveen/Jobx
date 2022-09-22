<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MasterAttributeCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function masterAttribute()
    {
        return $this->hasMany('App\Models\MasterAttribute', 'master_attribute_category_id');
    }

    
}

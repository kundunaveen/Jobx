<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Cms extends Model
{
    use HasFactory;

    public CONST CMS_SLUG_SETTING = 'setting';

    protected $fillable = [
        'title',
        'meta_keyword',
        'meta_description',
        'content',
        'slug',
    ];

    protected $cast = [
        'content' => 'array'
    ];

    public function getContentAttribute($value): array
    {
        return filled($value) ? json_decode($value, true) : [];
    }
}

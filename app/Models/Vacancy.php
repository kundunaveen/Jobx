<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacancy extends Model
{
    use HasFactory, SoftDeletes;

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
        'job_type',
        'images',
        'video'
    ];

    public CONST SUPPORTED_IMAGE_MIME_TYPE = [
        'jpeg',
        'png',
        'jpg'
    ];

    protected $append = [
        'single_image',
        'job_type_text'
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

    public function jobType()
    {
        return $this->belongsTo('App\Models\MasterAttribute', 'job_type');
    }

    public function applicants()
    {
        return $this->hasMany('App\Models\AppliedJob','vacancy_id');
    }

    public function getImagesInArray() :array{
        return filled($this->images) ? explode(',', $this->images) : [];
    }

    public function favoriteJobs(): HasMany{
        return $this->hasMany(FavoriteJob::class, 'vacancy_id');
    }

    public function getSingleImageAttribute() :string{
        return array_key_exists(0, $this->getImagesInArray()) ? asset('image/company_images/'. $this->getImagesInArray()[0]) : asset('assets/images/apple.png');
    }

    public function getJobTypeTextAttribute() :? string{
        return filled($this->job_type) ? MasterAttribute::where('id', $this->job_type)->value('value') : null;
    }
}

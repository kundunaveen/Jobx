<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

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

    public CONST IMAGE_PATH = 'image/company_images';
    public CONST VIDEO_PATH = 'image/company_videos';

    protected $append = [
        'video_url',
        'video_path',

        'single_image',
        
        'images_url',
        'images_path',

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

    public function getVideoUrlAttribute(){
        return filled($this->video) ? Storage::disk(config('settings.file_system_service'))->url(self::VIDEO_PATH.'/'.$this->video) : '';
    }

    public function getVideoPathAttribute()
    {
        return filled($this->video) ? self::VIDEO_PATH.'/'.$this->video : '';
    }

    public function getImagesUrlAttribute() :string{
        $images_url = [];
        foreach($this->getImagesInArray() as $image){
            $images_url[] = Storage::disk(config('settings.file_system_service'))->url(self::IMAGE_PATH.'/'.$image);
        }
        return $images_url;
    }

    public function getSingleImageAttribute() :string{
        return array_key_exists(0, $this->getImagesInArray()) ? Storage::disk(config('settings.file_system_service'))->url(self::IMAGE_PATH.'/'.$this->getImagesInArray()[0]) : asset('image/company.png');
    }

    public function getJobTypeTextAttribute() :? string{
        return filled($this->job_type) ? MasterAttribute::where('id', $this->job_type)->value('value') : null;
    }
}

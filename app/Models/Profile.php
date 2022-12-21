<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Profile extends Model
{
    use HasFactory;

    public CONST SUPPORTED_RESUME_MIME_TYPE = [
        'pdf',
        'docx',
    ];

    public CONST SUPPORTED_IMAGE_MIME_TYPE = [
        'jpeg',
        'png',
        'jpg'
    ];    

    public CONST SUPPORTED_VIDEO_MIME_TYPE = [
        'mp4'
    ];

    public CONST RESUME_PATH = 'image/resume';
    public CONST IMAGE_PATH = 'image/employee_images';
    public CONST VIDEO_PATH = 'image/employee_videos';

    public CONST EMPLOYER_IMAGE_PATH = 'image/company_images';
    public CONST EMPLOYER_VIDEO_PATH = 'image/company_videos';

    public CONST NOTIFICATION_OPTION_EMAIL = 'email';
    public CONST NOTIFICATION_OPTION_JOBAX = 'jobax';

    public CONST NOTIFICATION_OPTION_ARRAY = [
        self::NOTIFICATION_OPTION_EMAIL => 'Email',
        self::NOTIFICATION_OPTION_JOBAX => 'Jobax platform notification',

    ];

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
        'profile_summary',
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
        'video_link',
        'website_link',
        'date_of_birth',
        'current_job_title',
        'website_link',
        'social_media_link',
        'have_driving_license',
        'avg_rating'
    ];

    protected $casts = [
        'social_media_link' => 'array'
    ];

    protected $appends = [
        'profile_resume_url',
        'profile_resume_path',
        'profile_image_url',
        'profile_image_path',
        'profile_video_url',
        'profile_video_path',
        'profile_languages',
        'profile_skills',
        'profile_gender',

        'employer_image_url',
        'employer_image_path',
        'employer_video_url',
        'employer_video_path',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function getProfileResumeUrlAttribute()
    {
        return filled($this->resume) ? Storage::disk(config('settings.file_system_service'))->url(self::RESUME_PATH.'/'.$this->resume) : '';
    }

    public function getProfileResumePathAttribute()
    {
        return filled($this->resume) ? self::RESUME_PATH.'/'.$this->resume : '';
    }

    public function getProfileImageUrlAttribute(): string
    {
        return filled($this->logo) ? Storage::disk(config('settings.file_system_service'))->url(self::IMAGE_PATH.'/'.$this->logo) : asset('image/user.png');
    }

    public function getProfileImagePathAttribute()
    {
        return filled($this->logo) ? self::IMAGE_PATH.'/'.$this->logo : '';
    }

    public function getProfileVideoUrlAttribute()
    {
        return filled($this->intro_video) ? Storage::disk(config('settings.file_system_service'))->url(self::VIDEO_PATH.'/'.$this->intro_video) : '';
    }

    public function getProfileVideoPathAttribute()
    {
        return filled($this->intro_video) ? self::VIDEO_PATH.'/'.$this->intro_video : '';
    }

    public function getProfileLanguagesAttribute()
    {
        return filled($this->languages) ? MasterAttribute::whereIn('id', explode(',', $this->languages))->pluck('value') : '';
    }

    public function getProfileSkillsAttribute()
    {
        return filled($this->skills) ? JobSkill::whereIn('id', explode(',', $this->skills))->pluck('skill') : '';
    }

    public function getProfileGenderAttribute()
    {
        return filled($this->gender) ? MasterAttribute::where('id', $this->gender)->value('value') : '';
    }
    
    public function getEmployerImageUrlAttribute(): string
    {
        return filled($this->logo) ? Storage::disk(config('settings.file_system_service'))->url(self::EMPLOYER_IMAGE_PATH.'/'.$this->logo) : asset('image/user.png');
    }

    public function getEmployerImagePathAttribute()
    {
        return filled($this->logo) ? self::EMPLOYER_IMAGE_PATH.'/'.$this->logo : '';
    }

    public function getEmployerVideoUrlAttribute()
    {
        return filled($this->intro_video) ? Storage::disk(config('settings.file_system_service'))->url(self::EMPLOYER_VIDEO_PATH.'/'.$this->intro_video) : '';
    }

    public function getEmployerVideoPathAttribute()
    {
        return filled($this->intro_video) ? self::EMPLOYER_VIDEO_PATH.'/'.$this->intro_video : '';
    }
}

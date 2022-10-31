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
        'video_link',
        'website_link',
        'date_of_birth',
        'current_job_title',
        'website_link',
        'social_media_link',
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
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function getProfileResumeUrlAttribute(): string
    {
        return filled($this->resume) ? Storage::disk(config('settings.file_system_service'))->url(self::RESUME_PATH.'/'.$this->resume) : '';
    }

    public function getProfileResumePathAttribute(): string
    {
        return filled($this->resume) ? self::RESUME_PATH.'/'.$this->resume : '';
    }

    public function getProfileImageUrlAttribute(): string
    {
        return filled($this->logo) ? Storage::disk(config('settings.file_system_service'))->url(self::IMAGE_PATH.'/'.$this->logo) : '';
    }

    public function getProfileImagePathAttribute(): string
    {
        return filled($this->logo) ? self::IMAGE_PATH.'/'.$this->logo : '';
    }

    public function getProfileVideoUrlAttribute(): string
    {
        return filled($this->intro_video) ? Storage::disk(config('settings.file_system_service'))->url(self::VIDEO_PATH.'/'.$this->intro_video) : '';
    }

    public function getProfileVideoPathAttribute(): string
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

    public function getProfileGenderAttribute():string
    {
        return filled($this->gender) ? MasterAttribute::where('id', $this->gender)->value('value') : '';
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Profile extends Model
{
    use HasFactory;

    public CONST SUPPORTED_IMAGE_MIME_TYPE = [
        'jpeg',
        'png',
        'jpg'
    ];

    public CONST SUPPORTED_VIDEO_MIME_TYPE = [
        'mp4'
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
    ];

    protected $appends = [
        'profile_image_url',
        'profile_video_url',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function getProfileImageUrlAttribute(): string
    {
        return filled($this->logo) ? asset('image/employee_images/' . $this->logo) : '';
    }

    public function getProfileVideoUrlAttribute(): string
    {
        return filled($this->intro_video) ? asset('image/employee_videos/' . $this->intro_video) : '';
    }
}

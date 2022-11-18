<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProjectImage extends Model
{
    use HasFactory;

    public CONST SUPPORTED_IMAGE_MIME_TYPE = [
        'jpeg',
        'png',
        'jpg'
    ];

    public CONST IMAGE_PATH = 'image/project_images';

    protected $fillable = [
        'project_id',
        'image',
    ];

    protected $appends = [
        'image_url',
        'image_path'
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function getImageUrlAttribute(){
        return filled($this->image) ? Storage::disk(config('settings.file_system_service'))->url(self::IMAGE_PATH.'/'.$this->image) : asset('image/user.png');
    }

    public function getImagePathAttribute()
    {
        return filled($this->image) ? self::IMAGE_PATH.'/'.$this->image : '';
    }
}

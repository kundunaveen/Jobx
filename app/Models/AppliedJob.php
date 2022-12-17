<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AppliedJob extends Model
{
    use HasFactory;

    protected $table = 'applied_jobs';

    protected $fillable = [
        'user_id',
        'vacancy_id',
        'status',
        'cover_letter',
        'cover_video',
        'motivation_letter'
    ];

    public CONST VIDEO_PATH = 'image/applied_jobs';

    public const STATUS_IN_REVIEW = 0;
    public const STATUS_SHORTLISTED = 1;
    public const STATUS_REJECTED = 2;
    public const STATUS_HIRED = 3;
    public const STATUS_HOLD = 4;

    public const STATUS_ARRAY = [
        self::STATUS_IN_REVIEW => 'In Review',
        self::STATUS_SHORTLISTED => 'Shortlisted',
        self::STATUS_REJECTED => 'Rejected',
        self::STATUS_HIRED => 'Hired',
        self::STATUS_HOLD => 'Hold',
    ];

    protected $appends = [
        'status_name',
        'cover_video_url'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function vacancy()
    {
        return $this->belongsTo('App\Models\Vacancy', 'vacancy_id');
    }

    public function getCoverVideoUrlAttribute(): string
    {
        return filled($this->cover_video) ? Storage::disk(config('settings.file_system_service'))->url(self::VIDEO_PATH.'/'.$this->cover_video) : '';
    }

    public function getStatusNameAttribute()
    {
        switch ($this->status) {
            case self::STATUS_IN_REVIEW:
                $status = "In Review";
                break;
            case self::STATUS_SHORTLISTED:
                $status = "Shortlisted";
                break;
            case self::STATUS_REJECTED:
                $status = "Rejected";
                break;
            case self::STATUS_HIRED:
                $status = "Hired";
                break;
            case self::STATUS_HOLD:
                $status = "Hold";
                break;
            default:
                $status = "Something wrong";
        }
        
        return $status;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'user_id',
        'name',
        'role',
        'team_size',
        'description',
    ];

    protected $appends = [
        'image_url'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function getImageUrlAttribute()
    {
        return filled(optional($this->images()->first())->image) ? Storage::disk(config('settings.file_system_service'))->url(ProjectImage::IMAGE_PATH . '/' . optional($this->images()->first())->image) : asset('image/user.png');
    }
}

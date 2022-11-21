<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FavoriteJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vacancy_id',
    ];

    public function user() :BelongsTo{
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function vacancy() :BelongsTo{
        return $this->belongsTo(Vacancy::class, 'vacancy_id');
    }
}

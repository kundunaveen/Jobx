<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'company_id',
        'rating',
    ];

    protected $cast = [
        'rating' => 'integer'
    ];

    public function employee() :BelongsTo{
        return $this->belongsTo(User::class, 'employee_id')->withTrashed();
    }

    public function company() :BelongsTo{
        return $this->belongsTo(User::class, 'company_id')->withTrashed();
    }
}

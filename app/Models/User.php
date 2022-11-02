<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'contact', 'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'full_name', 'profile_image_url', 'profile_current_job_title'
    ];

    public function roleUser()
    {
        return $this->hasOne('App\Models\RoleUser', 'user_id');
    }

    public function profile()
    {
        return $this->hasOne('App\Models\Profile', 'user_id');
    }

    public static function employeeList()
    {
        $employees = DB::table('role_users')->join('users','users.id','role_users.user_id')->where('role_users.role_id', 3)->where('users.deleted_at', null)->select('users.*')->get();
        return $employees;
    }

    public static function employerList()
    {
        $employers = DB::table('role_users')->join('users','users.id','role_users.user_id')->where('role_users.role_id', 2)->where('users.deleted_at', null)->select('users.*')->get();
        return $employers;
    }

    public function experience():HasMany{
        return $this->hasMany(Experience::class);
    }

    public function educations():HasMany{
        return $this->hasMany(Education::class);
    }

    public function getFullNameAttribute():string{
        return $this->first_name .' '.$this->last_name;
    }

    public function getProfileImageUrlAttribute(): string{
        return $this->profile->profile_image_url;
    }

    public function getProfileCurrentJobTitleAttribute(): ?string{
        return filled(optional($this->profile)->current_job_title) ? optional($this->profile)->current_job_title : null;
    }
}

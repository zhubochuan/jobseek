<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Job;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_employer', 'linkedin_id', 'summary', 'phone', 'linkedin_id', 'linkedin_name', 'linkedin_token','api_token',
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

    public function saveJobs()
    {
        return $this->belongsToMany(Job::class, 'user_save_jobs')
            ->withTimestamps()
            ->orderBy('user_save_jobs.created_at', 'desc');
    }
    //jobs
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
    //working experience
    public function experience()
    {
        return $this->hasMany(Experience::class);
    }
    //file , resumes
    public function files()
    {
        return $this->hasMany(File::class);
    }
    //profile
    public function profiles()
    {
        return $this->hasOne(Profile::class);
    }
    //apply jobs
    public function applyJobs()
    {
        return $this->belongsToMany(Job::class, 'user_applied_jobs')
            ->withTimestamps()
            ->orderBy('user_applied_jobs.created_at', 'desc');
    }
}

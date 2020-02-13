<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    protected $table = 'user_applied_jobs';

    public function users()  //many to many between users and apply
    {
        return $this->belongsToMany('App\Models\User');
    }
}

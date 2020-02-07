<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'experience';


    protected $fillable = [
        'position', 'startTime', 'endTime', 'company', 'Position_status', 'duty', 'user_id', 'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

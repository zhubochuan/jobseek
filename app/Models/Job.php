<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Job extends Model
{
    protected $table = 'jobs';

    protected $fillable = [
        'title', 'type', 'classification', 'company logo', 'company name', 'city or suburb', 'company size', 'content', 'user_id',
        'location', 'closing date', 'salary', 'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';

    protected $fillable = [
        'title', 'type', 'classification','company logo','company name','city or suburb','company size','content',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = [
       'name','introduction','classification','company size','city','address','website','phone','logo','isreceive','user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

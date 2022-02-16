<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['user_id', 'workstart', 'workend'];
    
    public function user()
    {
        $this->belongsTo(User::class);
    }


}

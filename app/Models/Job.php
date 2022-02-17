<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Job extends Model
{
    protected $fillable = ['user_id', 'workstart', 'workend', 'day', 'updated_at', 'created_at'];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}

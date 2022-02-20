<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Rest;

class Job extends Model
{
    protected $fillable = ['user_id', 'workstart', 'workend', 'day', 'workTime','breakTime', 'updated_at', 'created_at'];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function rest()
    {
        $this->hasMany(Rest::class);
    }
}

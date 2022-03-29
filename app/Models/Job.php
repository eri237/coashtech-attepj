<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Rest;

class Job extends Model
{
    use HasFactory;
    protected $table = 'jobs';

    protected $fillable = [
        'user_id', 'workstart', 'workend', 'day'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function rest()
    {
        $this->hasMany(Rest::class);
    }
    
}

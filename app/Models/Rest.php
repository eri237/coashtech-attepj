<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;

class Rest extends Model
{
    protected $fillable = ['job_id', 'user_name',  'breakstart', 'breakend'];
    public function job()
    {
        $this->belongsTo(Job::class);
    }
}

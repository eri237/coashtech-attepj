<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Job;

class Rest extends Model
{
    protected $fillable = ['job_id', 'breakstart', 'breakend'];
    public function job()
    {
        $this->belongsTo(Job::class);
    }
}

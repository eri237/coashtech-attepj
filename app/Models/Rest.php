<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;

class Rest extends Model
{
    use HasFactory;
    protected $table = 'rests';
    protected $fillable = [
        'day', 'job_id', 'breakstart', 'breakend', 'breaktime'
    ];
    public function job()
    {
        $this->belongsTo(Job::class);
    }
}

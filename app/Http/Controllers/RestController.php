<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Job;
use App\Models\Rest;

class RestController extends Controller
{
    public function start()
    {
        $job = Job::first();
        $breakstart = Rest::where('job_id', $job->id)->latest()->first();

        $breakstart = Rest::create([
            'job_id' => $job->id,
            'breakstart' => Carbon::now(),

        ]);
        return redirect()->back()->with(['breakstart', '休憩開始']);
    }

    //休憩完了アクション
    public function end()
    {
        $job = Job::first();
        $breakend = Rest::where('job_id', $job->id)->latest()->first();
        $breakend->update([
            'breakend' => Carbon::now(),
        ]);
        return redirect()->back()->with('breakend', '退勤打刻が完了しました');
    }
    //
}

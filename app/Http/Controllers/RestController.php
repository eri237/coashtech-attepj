<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Job;
use App\Models\Rest;
use App\Models\User;

class RestController extends Controller
{
    public function start()
    {
        $rest = Auth::user();
        $breakstart = Rest::where('job_id', $rest->id)->latest()->first();

        $breakstart = Rest::create([
            'job_id' => $rest->id,
            'breakstart' => Carbon::now()->format("H:i:s"),
            'breakend' => 0,
            'breaktime' => 0

        ]);
        return redirect()->back()->with(['message', '休憩開始']);
    }

    //休憩完了アクション
    public function end()
    {
        $rest = Auth::user();
        $breakEnd = Rest::where('job_id', $rest->id)->latest()->first();

        $breakend = new carbon($breakEnd->breakend);
        $breakstart = new carbon($breakEnd->breakstart);

        $breakEnd->update([
            'breakend' => Carbon::now(),
            'breaktime' => $breaktime = (strtotime($breakend) - strtotime($breakstart))
        ]);
        return redirect()->back()->with('message', '休憩終了');
    }
    //
}

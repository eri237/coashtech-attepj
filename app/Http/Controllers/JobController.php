<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Job;
use App\Models\User;
use App\Models\Rest;


class JobController extends Controller
{
  public function new()
  {
    return view('new');
  }

  public function start()
  {
    $user = Auth::user();

    /**
     * 打刻は1日一回までにしたい
     * DB
     */
    //$oldTimestamp = Job::where('user_id', $user->id)->latest()->first();
    //if ($oldTimestamp) {
    //$oldTimestampPunchIn = new Carbon($oldTimestamp->workstart);
    //$oldTimestampDay = $oldTimestampPunchIn->startOfDay();
    //} else {
    $timestamp = Job::create([
      'user_id' => $user->id,
      'workstart' => Carbon::now(),
      'day' => Carbon::today(),
    ]);

    return redirect()->back()->with('my_status', '出勤打刻が完了しました');
  }




  //退勤アクション
  public function end()
  {
    $user = Auth::user();
    $workend = Job::where('user_id', $user->id)->latest()->first();

    $now = new Carbon();
    $workstart = new Carbon($workend->workstart);
    $breakstart = new Carbon($workend->breakstart);
    $breakend = new Carbon($workend->breakend);
    //実労時間(Minute)
    $stayTime = $workstart->diffInMinutes($now);
    $breaktime = $breakstart->diffInMinutes($breakend);
    $workingMinute = $stayTime - $breaktime;
    //15分刻み
    $workingHour = ceil($workingMinute / 15) * 0.25;

    $workend->update([
      'workend' => Carbon::now(),
      'workTime' => $workingHour,
      'breaktime' => $breaktime,
    ]);
    return redirect()->back()->with('my_status', '退勤打刻が完了しました');
  }


  public function index()
  {
    if (Auth::check()) {
      $today = Carbon::today();
      $day = intval($today->day);
      $format = $today->format('Y-m-d');
      //当日の勤怠を取得
      $items = Job::all();
      return view('index', ['itmes' => $items, 'day' => $format]);
    } else {
      return redirect('/attendance');
    }
  }
}

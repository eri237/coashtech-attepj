<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Job;
use App\Models\User;



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
    echo $timestamp;

    return redirect()->back()->with('my_status', '出勤打刻が完了しました');
  }




  //退勤アクション
  public function end()
  {
    $user = Auth::user();
    $timestamp = Job::where('user_id', $user->id)->latest()->first();

    $timestamp->update([
      'workend' => Carbon::now()
    ]);
    return redirect()->back()->with('my_status', '退勤打刻が完了しました');
  }


  public function index()
  {
    $items = Job::all();
    return "redirect('/attendance')";
  }
}

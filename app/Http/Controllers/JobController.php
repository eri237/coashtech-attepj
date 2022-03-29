<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Job;
use App\Models\User;
use App\Models\Rest;
use Illuminate\Support\Facades\DB;


class JobController extends Controller
{
  public function index(Request $request)
  {
    // 現在認証しているユーザーを取得
        $user = Auth::user();
        $date = $request['date'];

        
        //stamp_dateは今日の日付
        $day = Job::select('day')->get();


        

        $rests = Rest::select('job_id');
        
        //その日の日付だけの合計の休憩時間を取得（表示する）
        $breaktime = DB::table('rests')
            ->where('job_id', $user->id)
            ->where('updated_at','like', "$date%")//（updated_at）の％で(日付のみ)前方一致//likeはカラムの文字列検索ができる
            ->sum('breaktime');

            //秒
            $seconds = $breaktime % 60;
            $seconds=sprintf('%02d', $seconds);//0埋め00:00:00
            //分
            $difMinutes = ($breaktime - ($breaktime % 60)) / 60;
            $minutes = $difMinutes % 60;
            $minutes = sprintf('%02d', $minutes);//0埋め00:00:00
            //時
            $difHours = ($difMinutes - ($difMinutes % 60)) / 60;
            $hours = $difHours;
            $hours=sprintf('%02d',$hours);//0埋め00:00:00]

            

        //$変数 = モデル名::join('結合するテーブル名', '元のテーブルのキー', '=','結合するテーブルのキー')
        //->where('参照するカラム名', $引数で渡された値)
        //->get();
        //3つのテーブルを結合（user.stamp.rest）
        $users = Job::Join('users', 'jobs.user_id', 'users.id')
            ->leftJoinsub($rests, 'rests', function ($join) {
                $join->on('jobs.id', '=', 'rests.job_id');
            })
        ->where('day', $date)
        ->get();

        $items = Job::orderBy('updated_at', 'asc')->Paginate(5);
        
        return view('index', compact('users', 'date','day', 'minutes', 'seconds','hours','items'));
    }


    //return view('index', compact('today', 'jobs'));
  //}

  public function start()
  {
    // Userのmodelクラスのインスタンスを生成
    $user = new User();


    //打刻ページにアクセスできるのはログインユーザーのみ
    //user()メソッドは、認証を行ったユーザー情報を取得するためのメソッド
    $user = Auth::user();
    Job::create([
      'user_id' => $user->id,
      'workstart' => Carbon::now()->format('H:i:s'),
      'workend' => 0,
      'day' => Carbon::today()->format('Y-m-d'),
    ]);

    return redirect()->back()->with('message', '出勤打刻が完了しました');
  }


  //退勤アクション
  public function end()
  {
    $user = Auth::user();
    $workend = Job::where('user_id', $user->id)->latest()->first();

    $workend->update([
      'workend' => Carbon::now()
    ]);

    return redirect()->back()->with('message', 'お疲れ様でした');
   
  }


  public function new(Request $request)
  {
    $workstart = null;
    $workend = null;
    $breakstart = null;
    $breakend = null;

    $job = Job::where('user_id', Auth::id())->where('day', Carbon::today())->first();

    if (empty($job)) {
      return view('new', compact('workstart', 'workend', 'breakstart', 'breakend'));
    }
    //勤怠がある場合は、スタートタイムとエンドタイムのチェック
    if (!empty($job)) {
      $workstart = $job->workstart;
      $workend = $job->workend;
    }
    //自分の本日の休憩があるかのチェック、attendance_idで絞り込み(リレーションで取得)
    $rest = Rest::where('job_id', $job->id)->latest()->first();
    if (empty($rest)) {
      return view('new', compact('workstart', 'workend', 'breakstart', 'breakend'));
    }
    //休憩がある場合は、スタートタイムとエンドタイムのチェック
    if (!empty($rest)) {
      $breakstart = $rest->breakstart;
      $breakend = $rest->breakend;
    };
    //それらの情報を画面に受け渡す
    return view('new', compact('workstart', 'workend', 'breakstart', 'breakend'));
  }
}

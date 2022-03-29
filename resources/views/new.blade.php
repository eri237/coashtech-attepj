<!---------打刻ページ/パーツ----1------->

<style>
  .header {
    background: #FFFFFF;
  }

  .header-ttl {
    padding-left: 20px;
  }

  .header-nav {
    display: block;
  }

  .header-nav_list {
    display: flex;
    justify-content: flex-end;
    list-style: none;
  }

  .header-nav_item {
    padding-right: 15px;
  }

  .main {
    height: 80vh;
    background-color: #eee;
    padding-top: 30px;
    padding-left: calc((40% - 40px)/2);
    padding-right: calc((40% - 40px)/2);
  }

  .main-item {
    display: flex;
    margin-bottom: 40px;
    width: 100%;
    justify-content: space-between;
  }

  .time-add {
    height: 150px;
    width: 47%;
  }

  .btn-start,
  .btn-end {
    display: block;
    height: 100%;
    width: 100%;
    background-color: white;
    text-align: center;
    line-height: 150px;
    font-size: 20px;
    font-weight: bold;
    border: none;
  }

  .none-button {
    display: block;
    height: 150px;
    width: 47%;
    background-color: white;
    text-align: center;
    line-height: 150px;
    font-size: 20px;
    font-weight: bold;
    border: none;
    pointer-events: none;
    opacity: 0.1;
  }

  button:active {
    background-color: gray;
  }
</style>
@extends('Layouts.base')
<!--views/layouts/baseベース--->
<!----打刻ページ----->
@section('content')
<header class="header">
  <div class="header-ttl">
    <h1>Atte</h1>

  </div>
  <nav class="header-nav">
    <ul class="header-nav_list">
      <li class="header-nav_item"><a href="/">ホーム</a></li>
      <li class="header-nav_item"><a href="/attendance">日付一覧</a></li>
      <li class="header-nav_item"><a href="{{route('logout')}}">ログアウト</a></li>
    </ul>
  </nav>
</header>
<div class="main">
  <p class="">{{ Auth::user()->name}}さんお疲れ様です！</p>
  @if(session('message'))
  <div class="session">
    {{session('message')}}
  </div>
  @endif

  <div class="main-item">
    <!----------勤務開始------------>
    <form action="/workstart" class="time-add" method="POST">
      @csrf
      <button type="submit" class="btn-start">勤務開始</button>
      <!-- <input type='hidden' id="user_id" name="workstart" value="{{'workstart'}}"> -->
    </form>

    <!----------勤務終了------------>
    <form action="/workend" class="time-add" method="POST">
      @csrf
      <button type="submit" class="btn-end">勤務終了</button>
      <!-- <input type='hidden' id="user_id" name="workend" value="{{'workend'}}"> --> 　
    </form>

  </div>
  <!---end.main-item---->



  <div class="main-item">
    <!----------休憩開始------------>
    <form action="/breakstart" class="time-add" method="POST">
      @csrf
      <button type="submit" class="btn-start">休憩開始</button>
      <!-- <input type='hidden' id="job_id" name="breakstart" value="{{'breaksatrt'}}"> -->
    </form>
    <!----------休憩終了------------>
    <form action="/breakend" class="time-add" method="POST">
      @csrf
      <button type="submit" class="btn-end">休憩終了</button>
      <!-- <input type='hidden' id="job_id" name="breakend" value="{{'breakend'}}"> -->
    </form>

  </div>
  @endsection
  <!----end.打刻ページ----->


  <!--------------打刻ページ/パーツ----------->
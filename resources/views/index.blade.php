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

  table {
    width: 90%;
    border-spacing: 0;
    margin: auto;
  }

  table th {
    border-bottom: solid 2px #ddd;
    padding: 10px 0;
  }

  table td {
    border-bottom: solid 2px #ddd;
    text-align: center;
    padding: 10px 0;
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
<div class="container">
  <div class="search">
    <form action="/" method="post">
      @csrf
      <input type="hidden" name="back" value="">
    </form>
    <p class="date">{{$day}}</p>
  </div>
  <div class="attendance">
    <table>
      <tr>
        <th>名前</th>
        <th>勤務開始</th>
        <th>勤務終了</th>
        <th>休憩時間</th>
        <th>勤務時間</th>
      </tr>
      @foreach ($itmes as $itme)
      <tr>
        <td>{{$itme->user_id}}</td>
        <td>{{$itme->workstart->format('H:i:s')}}</td>
        <td>{{$itme->workend}}</td>
        <td>{{$itme->breaktime}}</td>
        <td>{{$itme->workTime}}</td>
      </tr>
      @endforeach
    </table>
  </div>

</div>
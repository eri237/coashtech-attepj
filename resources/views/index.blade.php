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

  svg.w-5.h-5 {
    /*paginateメソッドの矢印の大きさ調整のために追加*/
    width: 30px;
    height: 30px;
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
    <form action="/attendance" method="post">
      @csrf
      <p class="date">{{ date('Y-m-d')}}</p>
      <label for="date" class="mr-2 ">
        日付を選択して下さい
      </label>
      <input type="date" name="date" id="date">
      <button type="submit" class="search" value="">検索</button>

    </form>

  </div>
  <div class=" attendance">
    <table>
      <tr>
        <th>名前</th>
        <th>勤務開始</th>
        <th>勤務終了</th>
        <th>休憩時間</th>
        <th>勤務時間</th>
      </tr>
      @foreach ($users as $user)
      <tr>
        <td>{{$user->user->name}}</td>
        <td>{{$user->workstart}}</td>
        <td>{{$user->workend}}</td>
        <td>{{$hours}}:{{$minutes}}:{{$seconds}}</td>
        <td>{{ gmdate("H:i:s",(strtotime($user->workend)-strtotime($user->workstart))) }}</td>
      </tr>
      @endforeach
    </table>
    {{ $items->links() }}
  </div>
</div>
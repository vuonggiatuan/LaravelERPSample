@extends('master')
@section('title', '用戶列表')
@section('content')
<div class="container">
  <h2>用戶列表</h2>
  <table class="table">
    <thead>
      <tr>
        <td>名稱</td>
        <td>Email</td>
        <td>註冊時間</td>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td><a href="{!! action('UserController@edit', $user->id) !!}">{!! $user->name !!}</a></td>
        <td>{!! $user->email !!}</td>
        <td>{!! $user->created_at !!}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection

@extends('master')
@section('content')
<div class="container">
  <h2>職能列表<a href="{!! url('/roles/create'); !!}" class="btn btn-primary">新增職能</a></h2>
  <table class="table">
    <thead>
      <tr>
        <th>職能</th>
        <th>顯示名稱</th>
        <th>描述</th>
      </tr>
    </thead>
    <tbody>
    @foreach($roles as $role)
    <tr>
      <td>{!! $role->name !!}</td>
      <td>{!! $role->display_name !!}</td>
      <td>{!! $role->description !!}</td>
    </tr>
    @endforeach
    </tbody>
  </table>
</div>
@endsection

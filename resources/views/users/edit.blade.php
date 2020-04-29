@extends('master')
@section('title', '修改用戶資料')
@section('content')
<div class="container">
  <form method="post">
    <h2>修改用戶資料</h2>
    @if (session('status'))
      <div class="alert alert-success"> {{ session('status') }} </div>
    @endif
    {!! csrf_field() !!}
    <label for="name" class="control-label">姓名</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
    <label for="email" class="control-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
    <label for="select" class="col-lg-2 control-label">職能</label>
    <select class="form-control" id="role" name="role[]" multiple>
    @foreach($roles as $role)
      <option value="{!! $role->id !!}"
        @if(in_array($role->id, $selectedRoles))
          selected="selected"
        @endif
      >{!! $role->display_name !!}</option>
    @endforeach
    </select>
    <label for="password" class="control-label">密碼</label>
    <input type="password" class="form-control" name="password">
    <label for="password" class="col-lg-2 control-label">重輸入密碼</label>
    <input type="password" class="form-control" name="password_confirmation">
    <button type="submit" class="btn btn-primary">確認</button>

  </form>
</div>
@endsection

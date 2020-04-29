@extends('master')
@section('content')
<div class="container">
  <form method=post>
    <legend><h2>新增倉儲資料</h2></legend>
    @if (session('status'))
      <div class="alert alert-success"> {{ session('status') }} </div>
    @endif
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <label for="name">倉儲名稱</label>
    <input type="text" id="name" name="name" class="form-control">
    <button type="submit" class="btn btn-primary btn-lg">新增</button>
  </form>
</div>
@endsection

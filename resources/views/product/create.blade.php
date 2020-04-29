@extends('master')
@section('content')
<div class="container">
  <legend><h2>新增產品資料</h2></legend>
  <form method="post">
    @if (session('status'))
      <div class="alert alert-success"> {{ session('status') }} </div>
    @endif
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <label for="name">產品名稱：</label>
    <input type="text" id="name" name="name" class="form-control">
    <button type="submit" class="btn btn-primary btn-lg">新增</button>
  </form>
</div>
@endsection

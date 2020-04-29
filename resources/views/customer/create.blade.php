@extends('master')
@section('content')
<div class="container">
  <form method="post">
    <legend><h2>新增顧客資料</h2></legend>
    @if (session('status'))
      <div class="alert alert-success"> {{ session('status') }} </div>
    @endif
    <div class="form-group">
      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
      <label for="id">編號/統編：</label>
      <input type="text" id="id" name="id" class="form-control">
      <label for="name">名稱</label>
      <input type="text" id="name" name="name" class="form-control">
      <button type="submit" class="btn btn-primary btn-lg">新增</button>
    </div>
  </form>
</div>
@endsection

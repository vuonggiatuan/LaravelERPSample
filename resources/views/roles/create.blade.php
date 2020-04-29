@extends('master')
@section('content')
<div class="container">
  <form method="post">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <legend>建立新職能</legend>
    @if (session('status'))
      <div class="alert alert-success"> {{ session('status') }} </div>
    @endif

    <label for="name" class="control-label">名稱</label>
    <input type="text" class="form-control" id="name" name="name">
    <label for="display_name" class="control-label">顯示名稱</label>
    <input type="display_name" class="form-control" id="display_name" name="display_name">
    <label for="description" class="control-label">描述</label>
    <textarea class="form-control" rows="3" id="description" name="description"></textarea>
    <button type="submit" class="btn btn-primary">新增</button>
  </form>
</div>
@endsection

@extends('master')
@section('content')
<div class="container">
  <legend><h2>新增製程記錄</h2></legend>
  <form method="post">
    @if (session('status'))
      <div class="alert alert-success"> {{ session('status') }} </div>
    @endif
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <label for="order_id">訂單編號：</label>
    <input type="text" id="order_id" name="order_id" class="form-control" value="{!! $order->id !!}">
    <label for="name">製程名稱：</label>
    <input type="text" id="name" name="name" class="form-control">
    <label for="manufacture_cost">製造成本：</label>
    <input type="text" id="manufacture_cost" name="manufacture_cost" class="form-control">
    <label for="labor_cost">人力成本：</label>
    <input type="text" id="labor_cost" name="labor_cost" class="form-control">
    <button type="submit" class="btn btn-primary btn-lg">新增</button>
  </form>
</div>
@endsection

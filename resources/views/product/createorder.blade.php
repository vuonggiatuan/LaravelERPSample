@extends('master')
@section('content')
<div class="container">
  <legend><h2>新增產品工單</h2></legend>
  <form method="post">
    @if (session('status'))
      <div class="alert alert-success"> {{ session('status') }} </div>
    @endif
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <label for="product_id">產品編號：</label>
    <input type="text" id="product_id" name="product_id" class="form-control">
    <label for="quantity">數量：</label>
    <input type="text" id="quantity" name="quantity" class="form-control">
    <label for="dept">部門：</label>
    <input type="text" id="dept" name="dept" class="form-control">
    <label for="scheduled_date">開工時間：</label>
    <input type="text" id="scheduled_date" name="scheduled_date" class="form-control">
    <button type="submit" class="btn btn-primary btn-lg">新增</button>
  </form>
</div>
@endsection

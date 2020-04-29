@extends('master')
@section('content')
<div class="container">
  <legend><h2>新增產品製程</h2></legend>
  <form method="post">
    @if (session('status'))
      <div class="alert alert-success"> {{ session('status') }} </div>
    @endif
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <label for="product_id">產品編號：</label>
    <input type="text" id="product_id" name="product_id" class="form-control" value="{!! $product->id !!}">
    <label for="name">名稱：</label>
    <input type="text" id="name" name="name" class="form-control">
    <label for="percent">進度：</label>
    <input type="text" id="percent" name="percent" class="form-control">
    <button type="submit" class="btn btn-primary btn-lg">新增</button>
  </form>
</div>
@endsection

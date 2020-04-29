@extends('master')
@section('content')
<div class="container">
  <legend><h2>物料工單-{!! $product->name !!}</h2></legend>
  <table class="table table-bordered">
  <thead>
    <tr>
      <th>名稱</th>
      <th>單位</th>
      <th>數量</th>
    </tr>
  </thead>
  @foreach($components as $component)
  <tr>
    <td>{!! $component->name!!}</td>
    <td>{!! $component->unit!!}</td>
    <td>{!! $component->quantity!!}</td>
  </tr>
  @endforeach
  </table>
  <legend><h3>新增工單項目</h3></legend>
  <form method="post"  action="{{ action('BomController@newcomponent') }}">
    @if (session('status'))
      <div class="alert alert-success"> {{ session('status') }} </div>
    @endif
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <input type="hidden" name="product_id" value="{!! $product->id !!}">
    <label for="material_id">物料編號</label>
    <input type="text" id="material_id" name="material_id" class="form-control">
    <label for="name">物料名稱</label>
    <input type="text" id="name" name="name" class="form-control">
    <label for="unit">單位</label>
    <input type="text" id="unit" name="unit" class="form-control">
    <label for="payment_method">數量</label>
    <input type="text" id="quantity" name="quantity" class="form-control">
    <button type="submit" class="btn btn-primary btn-lg">新增</button>
  </form>
</div>
@endsection

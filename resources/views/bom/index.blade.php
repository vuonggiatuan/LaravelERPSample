@extends('master')
@section('content')
<div class="container">
  <legend><h2>物料工單列表</h2></legend>
  <table class="table">
  <thead>
  <tr>
    <th>名稱</th>
  </tr>
  </thead>
  @foreach($products as $product)
  <tr>
    <td><a href="{!! url('/bom/detail', ['id' => $product->id]); !!}">{!! $product->name!!}</a></td>
  </tr>
  @endforeach
  </table>
</div>
@endsection

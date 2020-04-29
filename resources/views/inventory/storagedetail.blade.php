@extends('master')
@section('content')
<div class="container">
  <legend><h1>倉庫詳細-{!! $storage->name!!}</h1></legend>
  <table class="table">
    <thead>
    <tr>
      <td>產品編號</td>
      <td>數量</td>
      <td>價格</td>
      <td>更新時間</td>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
    <tr>
      <td><a href="{!! url('/product/detail', ['id' => $item->product_id]); !!}" >{!! $item->product_id !!}</a></td>
      <td>{!! $item->quantity !!}</td>
      <td>{!! $item->price !!}</td>
      <td>{!! $item->updated_at !!}</td>
    </tr>
    @endforeach
    </tbody>
  </table>
</div>
@endsection

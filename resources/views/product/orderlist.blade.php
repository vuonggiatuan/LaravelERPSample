@extends('master')
@section('content')
<div class="container">
  <legend><h2>生產工單列表</h2></legend>
  <table class="table">
  <thead>
  <tr>
    <th>訂單編號</th>
    <th>產品編號</th>
    <th>排程日期</th>
    <th>部門</th>
    <th>狀態</th>
  </tr>
  </thead>
  @foreach($orders as $order)
  <tr>
    <td><a href="{!! url('/product/orderdetail', ['id' => $order->id]); !!}">{!! $order->id!!}</a></td>
    <td>{!! $order->product_id!!}</td>
    <td>{!! $order->quantity!!}</td>
    <td>{!! $order->scheduled_date!!}</td>
    <td>{!! $order->dept!!}</td>
    <td>{!! $order->status!!}</td>
  </tr>
  @endforeach
  </table>
</div>
@endsection

@extends('master')
@section('content')
<div class="container">
  <legend>銷售單列表</legend>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>銷售日期</th>
        <th>狀態</th>
        <th>出貨倉庫</th>
        <th>付款方式</th>
        <th>建立時間</th>
      </tr>
    </thead>
    <tbody>
      @foreach($orders as $order)
      <tr>
        <td><a href="{!! url('/sale/detail', ['id' => $order->id]); !!}">{!! $order->id !!}</td>
        <td>{!! $order->date !!}</td>
        <td>{!! $order->status !!}</td>
        <td>{!! $order->warehouse !!}</td>
        <td>{!! $order->payment_method !!}</td>
        <td>{!! $order->created_at !!}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection

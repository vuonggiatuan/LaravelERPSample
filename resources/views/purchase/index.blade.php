@extends('master')
@section('content')
<div class="container">
  <legend>採購單列表</legend>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>生產工單</th>
        <th>供應商</th>
        <th>目標倉庫</th>
        <th>付款方式</th>
        <th>建立時間</th>
      </tr>
    </thead>
    <tbody>
      @foreach($orders as $order)
      <tr>
        <td><a href="{!! url('/purchase/detail', ['id' => $order->id]); !!}">{!! $order->id !!}</td>
        <td>{!! $order->manufacture_id !!}</td>
        <td>{!! $order->vendor_id !!}</td>
        <td>{!! $order->deliver_to !!}</td>
        <td>{!! $order->payment_method !!}</td>
        <td>{!! $order->created_at !!}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection

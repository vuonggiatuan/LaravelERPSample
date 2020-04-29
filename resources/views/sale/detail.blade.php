@extends('master')
@section('content')
<?php
  $total=0;
?>
<div class="container">
  <legend><h2>銷售單-{!! $order->id !!}</h2></legend>
  @if (session('status'))
    <div class="alert alert-success"> {{ session('status') }} </div>
  @endif
  <div class="btn-group">
    <a href="{!! url('/sale/createjournal', ['id' => $order->id]); !!}" class="btn btn-primary btn-lg">建立會計記錄</a>
    <a href="{!! url('/sale/createstockmove', ['id' => $order->id]); !!}" class="btn btn-primary btn-lg">建立庫存異動記錄</a>
  </div>
  <table class="table">
    <tr>
      <td>銷單編號：</td>
      <td>{!! $order->id !!}</td>
      <td>客戶編號：</td>
      <td>{!! $order->customer_id !!}</td>
    </tr>
    <tr>
      <td>建立日期：</td>
      <td>{!! $order->created_at !!}</td>
      <td>客戶名稱：</td>
      <td>{!! $order->customer_name !!}</td>
    </tr>
    <tr>
      <td>出貨倉庫：</td>
      <td>{!! $order->warehouse !!}</td>
      <td>客戶電話：</td>
      <td>{!! $order->customer_tel !!}</td>
    </tr>
    <tr>
      <td>部門：</td>
      <td>{!! $order->dept !!}</td>
      <td>客戶地址：</td>
      <td>{!! $order->customer_add !!}</td>
    </tr>
    <tr>
      <td>發票編號：</td>
      <td>{!! $order->invoice !!}</td>
      <td></td>
      <td></td>
    </tr>
  </table>
  <legend><h3>銷售細項</h3></legend>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>商品</th>
        <th>單位</th>
        <th>數量</th>
        <th>價錢</th>
        <th>總共</th>
      </tr>
    </thead>
    @foreach($items as $item)
    <tr>
      <td>{!! $item->name!!}</td>
      <td>{!! $item->unit!!}</td>
      <td>{!! $item->quantity!!}</td>
      <td>{!! $item->price!!}</td>
      <td>{!! $item->subtotal!!}</td>
    </tr>
    <?php
      $total=$total+$item->subtotal;
    ?>
    @endforeach
    <tr>
      <td colspan="4" align="center">未含稅總共：</td>
      <td>{!! $total !!}</td>
    </tr>
    <tr>
      <td colspan="4" align="center">稅：</td>
      <td>{!! round($total*5/100) !!}</td>
    </tr>
    <tr>
      <td colspan="4" align="center">含稅總共：</td>
      <td>{!! $total+round($total*5/100) !!}</td>
    </tr>
  </table>

  <legend><h3>庫存細項</h3></legend>
  <table class="table table-bordered">
    <thead>
      <tr>
        <td>編號</td>
        <td>物料名稱</td>
        <td>出發</td>
        <td>目的地</td>
        <td>數量</td>
        <td>價格</td>
        <td>狀態</td>
      </tr>
    </thead>
    <tbody>
    @foreach($stockmoves as $record)
    <tr>
      <td><a href="{!! url('/inventory/stockmovedetail', ['id' => $record->id]); !!}">{!! $record->id !!}</a></td>
      <td>{!! $record->name !!}</td>
      <td>{!! $record->source !!}</td>
      <td>{!! $record->destination !!}</td>
      <td>{!! $record->quantity !!}</td>
      <td>{!! $record->price !!}</td>
      <td>{!! $record->status !!}</td>
    </tr>
    @endforeach
    </tbody>
  </table>

  <legend><h3>會計記錄</h3></legend>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>內容</th>
        <th>資產-借方</th>
        <th>負債-貸方</th>
        <th>金額</th>
        <th>建檔時間</th>
      </tr>
    </thead>
    <tbody>
      @foreach($records as $record)
        <tr>
          <td><a href="{!! url('/accountingrecord/detail', ['id' => $record->id]); !!}">{!! $record->id !!}</a></td>
          <td>{!! $record->content !!}</td>
          <td>{!! $record->asset !!}</td>
          <td>{!! $record->liability !!}</td>
          <td>{!! $record->amount !!}</td>
          <td>{!! $record->created_at !!}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

</div>
@endsection

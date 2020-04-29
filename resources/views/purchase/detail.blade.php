@extends('master')
@section('content')
<?php
  $total=0;
?>
<div class="container">
  <legend><h2>採購單-{!! $order->id !!}</h2></legend>
  @if (session('status'))
    <div class="alert alert-success"> {{ session('status') }} </div>
  @endif
  <div class="btn-group">
    <a href="{!! url('/purchase/createjournal', ['id' => $order->id]); !!}" class="btn btn-primary btn-lg">建立會計記錄</a>
    <a href="{!! url('/purchase/createstockmove', ['id' => $order->id]); !!}" class="btn btn-primary btn-lg">建立物料異動記錄</a>

  </div>
  <table class="table">
    <tr>
      <td>編號：</td>
      <td>{!! $order->id !!}</td>
      <td>建立日期：</td>
      <td>{!! $order->created_at !!}</td>
    </tr>
    <tr>
      <td>生產工單：</td>
      <td>{!! $order->manufacture_id !!}</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>廠商編號：</td>
      <td>{!! $order->vendor_id !!}</td>
      <td>付款方式：</td>
      <td>{!! $order->payment_method !!}</td>
    </tr>
  </table>
  <legend><h3>採購細項</h3></legend>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>物料</th>
        <th>數量</th>
        <th>價錢</th>
        <th>總共</th>
      </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
    <tr>
      <td>{!! $item->name!!}</td>
      <td>{!! $item->quantity!!}</td>
      <td>{!! $item->price!!}</td>
      <td>{!! $item->subtotal!!}</td>
    </tr>
    <?php
      $total=$total+$item->subtotal;
    ?>
    @endforeach
    <tr>
      <td colspan="3" align="center">未含稅總共：</td>
      <td>{!! $total !!}</td>
    </tr>
    <tr>
      <td colspan="3" align="center">稅：</td>
      <td>{!! round($total*5/100) !!}</td>
    </tr>
    <tr>
      <td colspan="3" align="center">含稅總共：</td>
      <td>{!! $total+round($total*5/100) !!}</td>
    </tr>
    </tbody>
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

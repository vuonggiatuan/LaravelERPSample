@extends('master')
@section('content')
<div class="container">
  <legend><h2>生產工單-{!! $order->id !!}</h2></legend>
  @if (session('status'))
    <div class="alert alert-success"> {{ session('status') }} </div>
  @endif
  <div class="btn-group">
    <a href="{!! url('/product/createstockmove', ['id' => $order->id]); !!}" class="btn btn-primary btn-lg">領料</a>
    <a href="{!! url('/product/createjournal', ['id' => $order->id]); !!}" class="btn btn-primary btn-lg">建立會計記錄</a>
    <a href="{!! url('/product/manufactureputin', ['id' => $order->id]); !!}" class="btn btn-primary btn-lg">入庫</a>
  </div>
  <table class="table">
    <tr>
      <td>生產工單：</td>
      <td>{!! $order->id !!}</td>
      <td>產品編號：</td>
      <td>{!! $order->product_id!!}</td>
    </tr>
    <tr>
      <td>排程日期：</td>
      <td>{!! $order->scheduled_date !!}</td>
      <td>負責部門：</td>
      <td>{!! $order->dept!!}</td>
    </tr>
    <tr>
      <td>生產數量：</td>
      <td>{!! $order->quantity !!}</td>
      <td>工單狀態：</td>
      <td>{!! $order->status!!}</td>
    </tr>
  </table>
  <div class="btn-group">
    <a href="{!! url('/product/ordercostanalysis', ['id' => $order->id]); !!}" class="btn btn-success btn-lg">工單成本分析</a> 
  </div>
  <legend><h3>工單項目</h3></legend>
  <table class="table table-bordered">
    <thead>
      <tr>
        <td>名稱</td>
        <td>單位</td>
        <td>規劃量</td>
        <td>已使用量</td>
      </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
      <tr>
        <td>{!! $item->name!!}</td>
        <td>{!! $item->unit!!}</td>
        <td>{!! $item->scheduled_quantity!!}</td>
        <td>{!! $item->consumed_quantity !!}</td>
      </tr>
    @endforeach
    </tbody>
  </table>

  <legend><h3>製程細項<a href="{!! url('/product/newmanufactureprocess', ['id' => $order->id]); !!}" class="btn btn-primary">新增製程</a></h3></legend>
  <table class="table table-bordered">
    <thead>
    <tr>
      <td>製程名稱</td>
      <td>製造成本</td>
      <td>人力成本</td>
    </tr>
    </thead>
    <tbody>
    @foreach($processes as $item)
    <tr>
      <td>{!! $item->name !!}</td>
      <td>{!! $item->manufacture_cost !!}</td>
      <td>{!! $item->labor_cost !!}</td>
    </tr>
    @endforeach
    </tbody>
  </table>

  <legend><h3>庫存細項</h3></legend>
  <table class="table table-bordered">
    <thead>
      <tr>
        <td>編號</td>
        <td>物料名稱</td>
        <td>類型</td>
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
      <td>{!! $record->type !!}</td>
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

@extends('master')
@section('content')
<div class="container">
  <legend>物料異動列表</legend>
  <table class="table">
    <thead>
      <tr>
        <td>編號</td>
        <td>物料名稱</td>
        <td>單據來源</td>
        <td>類型</td>
        <td>出發</td>
        <td>目的地</td>
        <td>數量</td>
        <td>價格</td>
        <td>狀態</td>
      </tr>
    </thead>
    <tbody>
    @foreach($records as $record)
    <tr>
      <td><a href="{!! url('/inventory/stockmovedetail', ['id' => $record->id]); !!}">{!! $record->id !!}</a></td>
      <td>{!! $record->name !!}</td>
      <td>{!! $record->reference_id !!}</td>
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
</div>
@endsection

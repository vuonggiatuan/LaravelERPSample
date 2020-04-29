@extends('master')
@section('content')
<div class="container">
  <legend><h1>預算列表<a href="{!! url('/accountingledger/createbudget'); !!}"  class="btn btn-primary">新增預算</a></h1></legend>
  <table class="table">
    <thead>
    <tr>
      <td>會計科目</td>
      <td>年份</td>
      <td>預算</td>
    </tr>
    </thead>
    <tbody>
    @foreach($budgets as $item)
    <tr>
      <td>{!! $item->ledger_id!!}</td>
      <td>{!! $item->year!!}</td>
      <td align="right">{!! number_format($item->budget)!!}</td>
    </tr>
    @endforeach
    </tbody>
  </table>
</div>
@endsection

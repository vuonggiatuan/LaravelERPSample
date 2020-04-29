@extends('master')
@section('content')
<div class="container">
  <h2>會計科目</h2>
  <table class="table">
    <thead>
      <tr>
        <td>ID</td>
        <td>名稱</td>
        <td>主科目</td>
      </tr>
    </thead>
    <tbody>
      @foreach($ledgers as $ledger)
        <tr>
          <td>{!! $ledger->id !!}</td>
          <td>{!! $ledger->name !!}</td>
          <td>{!! $ledger->parent !!}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection

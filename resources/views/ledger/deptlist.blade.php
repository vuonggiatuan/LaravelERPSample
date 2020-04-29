@extends('master')
@section('content')
<div class="container">
  <h2>部門</h2>
  <table class="table">
    <thead>
      <tr>
        <td>ID</td>
        <td>名稱</td>
        <td>地區</td>
        <td>職能</td>
        <td>科目</td>
        <td>零用金</td>
      </tr>
    </thead>
    <tbody>
      @foreach($depts as $dept)
        <tr>
          <td>{!! $dept->id !!}</td>
          <td>{!! $dept->name !!}</td>
          <td>{!! $dept->region !!}</td>
          <td>{!! $dept->function !!}</td>
          <td>{!! $dept->account !!}</td>
          <td>{!! number_format($dept->allowance) !!}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection

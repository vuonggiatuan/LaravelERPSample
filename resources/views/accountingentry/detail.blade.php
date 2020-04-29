@extends('master')
@section('content')
<div class="container">
  <h2>分錄-{!! $entry->id !!}</h2>
  <table class="table">
    <tr>
      <td>分錄編號:</td>
      <td>{!! $entry->id !!}</td>
      <td>建立時間:</td>
      <td>{!! $entry->created_at !!}</td>
    </tr>
    <tr>
      <td>部門:</td>
      <td>{!! $entry->dept !!}</td>
      <td>分類:</td>
      <td>{!! $entry->purpose !!}</td>
    </tr>
    <tr>
      <td>備註:</td>
      <td colspan="3">{!! $entry->remark !!}</td>
    </tr>
  </table>
  <legend><h3>細項</h3></legend>
  <table class="table table-bordered">
    <thead>
    <tr>
      <td>內容</td>
      <td>借方</td>
      <td>貸方</td>
      <td>金額</td>
    </tr>
    </thead>
    @foreach($records as $record)
    <tr>
      <td>{!! $record->content!!}</td>
      <td>{!! $record->asset!!}</td>
      <td>{!! $record->liability!!}</td>
      <td>{!! $record->amount!!}</td>

    </tr>
    @endforeach
  </table>
</div>
@endsection

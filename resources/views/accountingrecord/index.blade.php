@extends('master')
@section('content')
<div class="container">
  <legend><h2>會計記錄</h2></legend>

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

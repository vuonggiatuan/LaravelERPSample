@extends('master')
@section('content')
<div class="container">
  <h2>會計分錄列表</h2>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>部門</th>
        <th>目的</th>
        <th>用途</th>
        <th>Created at</th>
      </tr>
    </thead>
    <tbody>
      @foreach($entrys as $entry)
        <tr>
          <td><a href="{!! url('/accountingentry/detail', ['id' => $entry->id]); !!}">{!! $entry->id !!}</a></td>
          <td>{!! $entry->dept !!}</td>
          <td>{!! $entry->purpose !!}</td>
          <td>{!! $entry->remark !!}</td>
          <td>{!! $entry->created_at !!}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection

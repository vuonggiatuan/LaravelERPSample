@extends('master')
@section('content')
<div class="container">
  <legend><h1>異動記錄-{!! $record->id!!}</h1></legend>
  @if (session('status'))
    <div class="alert alert-success"> {{ session('status') }} </div>
  @endif
  <table class="table table-bordered">
    <tr>
      <td>修改狀態</td>
      <td>
        <select class="form-control" onchange="location=this.value;">
          <option>請選擇</option>
          <option value="{!! url('/inventory/stockmovestatus', ['id' => $record->id,'status'=>'申請入庫']); !!}">申請入庫</option>
          <option value="{!! url('/inventory/stockmovestatus', ['id' => $record->id,'status'=>'核准入庫']); !!}">核准入庫</option>
          <option value="{!! url('/inventory/stockmovestatus', ['id' => $record->id,'status'=>'已入庫']); !!}">已入庫</option>
          <option value="{!! url('/inventory/stockmovestatus', ['id' => $record->id,'status'=>'拒絕']); !!}">拒絕</option>
        </select>
      </td>
    </tr>
  </table>
</div>
@endsection

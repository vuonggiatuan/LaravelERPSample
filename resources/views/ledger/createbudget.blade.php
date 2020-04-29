@extends('master')
@section('content')
<div class="container">
  <legend><h1>新增預算</h1></legend>
  <form method=post>
    @if (session('status'))
      <div class="alert alert-success"> {{ session('status') }} </div>
    @endif
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <label for="ledger_id">會計科目</label>
    <input type="text" id="ledger_id" name="ledger_id" class="form-control">
    <label for="year">年份</label>
    <input type="text" id="year" name="year" class="form-control">
    <label for="budget">預算</label>
    <input type="text" id="budget" name="budget" class="form-control">
    <button type="submit" class="btn btn-primary btn-lg">新增</button>
  </form>
</div>
@endsection

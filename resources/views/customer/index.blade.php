@extends('master')
@section('content')
<div class="container">
  <legend><h1>客戶列表<a class="btn btn-primary btn-lg" href="{!! url('/customer/create'); !!}">新增</a></h1></legend>
  @if (session('status'))
    <div class="alert alert-success"> {{ session('status') }} </div>
  @endif
</div>
@endsection

@extends('master')
@section('content')
<div class="container">
  <legend>
    <h1>倉儲列表
    <a href="{!! url('/inventory/newstorage'); !!}"  class="btn btn-primary">新增倉儲</a>
    </h1>
    <table class="table">
      <thead>
      <tr>
        <td>倉儲名稱</td>
        <td></td>
      </tr>
      </thead>
      <tbody>
      @foreach($storages as $storage)
      <tr>
        <td><a href="{!! url('/inventory/storagedetail', ['id' => $storage->id]); !!}" >{!! $storage->name !!}</a></td>
        <td></td>
      </tr>
      @endforeach
      </tbody>
    </table>
</div>
@endsection

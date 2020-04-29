@extends('master')
@section('content')
<div class="container">
  <legend><h1>產品-{!! $product->name !!}</h1></legend>
  <legend><h3>倉儲</h3></legend>
  <table class="table">
    <thead>
    <tr>
      <td>倉儲編號</td>
      <td>數量</td>
      <td>價格</td>
      <td>更新時間</td>
    </tr>
    </thead>
    <tbody>
    @foreach($storages as $item)
    <tr>
      <td><a href="{!! url('/inventory/storagedetail', ['id' => $item->storage_id]); !!}" >{!! $item->storage_id !!}</a></td>
      <td>{!! $item->quantity !!}</td>
      <td>{!! $item->price !!}</td>
      <td>{!! $item->updated_at !!}</td>
    </tr>
    @endforeach
    </tbody>
  </table>

  <legend><h3>製程<a class="btn btn-primary"  href="{!! url('/product/createprocess', ['id' => $product->id]); !!}" >新增製程</a></h3></legend>
  <table class="table">
    <thead>
    <tr>

      <td>名稱</td>
      <td>步驟</td>

    </tr>
    </thead>
    <tbody>
    @foreach($processes as $item)
    <tr>

      <td>{!! $item->name !!}</td>
      <td>{!! $item->percent !!}%</td>

    </tr>
    @endforeach
    </tbody>
  </table>
</div>
@endsection

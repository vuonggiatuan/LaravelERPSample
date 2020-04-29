@extends('master')
@section('content')
<div class="container">
  <legend><h2>新增銷售訂單</h2></legend>
  @if (session('status'))
    <div class="alert alert-success"> {{ session('status') }} </div>
  @endif
  <form method="post">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <label for="date">訂單時間</label>
    <input type="text" id="date" name="date" class="form-control">
    <label for="warehouse">出貨倉庫</label>
    <input type="text" id="warehouse" name="warehouse" class="form-control">
    <label for="customer_id">客戶編號</label>
    <input type="text" id="customer_id" name="customer_id" class="form-control">
    <label for="customer_name">客戶名稱</label>
    <input type="text" id="customer_name" name="customer_name" class="form-control">
    <label for="customer_tel">客戶電話</label>
    <input type="text" id="customer_tel" name="customer_tel" class="form-control">
    <label for="customer_add">客戶地址</label>
    <input type="text" id="customer_add" name="customer_add" class="form-control">
    <input type="hidden" id="it_post" name="it_post" class="form-control">
    <legend><h3>新增項目</h3></legend>
    <table class="table" id="it_table">
      <tr>
        <td>物料編號</td>
        <td>名稱</td>
        <td>單位</td>
        <td>數量</td>
        <td>價錢</td>
        <td>總價</td>
      </tr>
      <tr>
        <td><input type="text" id="product_id" class="form-control"></td>
        <td><input type="text" id="name" class="form-control"></td>
        <td><input type="text" id="unit" class="form-control"></td>
        <td><input type="text" id="quantity" class="form-control"></td>
        <td><input type="text" id="price" class="form-control"></td>
        <td><input type="text" id="subtotal" class="form-control"></td>
      </tr>
      <tr>
        <td colspan="5"></td>
        <td><a class="btn btn-primary" id="add_btn">新增</a></td>
      </tr>
    </table>
    <button type="submit" class="btn btn-primary btn-lg">新增</button>
  </form>
</div>
<script>
$(document).ready(function(){
  var obj={};
  obj.it=[];
  $('#add_btn').click(function(){
    obj.it.push({ product_id: $('#product_id').val(),name: $('#name').val(),unit: $('#unit').val(),quantity: $('#quantity').val(),price: $('#price').val(),subtotal: $('#subtotal').val() });
    $('#it_table').append('<tr><td>'+$('#product_id').val()+'</td><td>'+$('#name').val()+'</td><td>'+$('#unit').val()+'</td><td>'+$('#quantity').val()+'</td><td>'+$('#price').val()+'</td><td>'+$('#subtotal').val()+'</td></tr>');
    $('#it_post').val(JSON.stringify(obj.it));
  });
});
</script>
@endsection

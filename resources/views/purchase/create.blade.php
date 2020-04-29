@extends('master')
@section('content')
<div class="container">
  <form method=post>
    <legend><h2>新增採購單</h2></legend>
    @if (session('status'))
      <div class="alert alert-success"> {{ session('status') }} </div>
    @endif
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <label for="manufacture_id">生產工單編號</label>
    <input type="text" id="manufacture_id" name="manufacture_id" class="form-control">
    <label for="vendor_id">供應商編號</label>
    <input type="text" id="vendor_id" name="vendor_id" class="form-control">
    <label for="deliver_to">目標倉庫</label>
    <input type="text" id="deliver_to" name="deliver_to" class="form-control">
    <label for="payment_method">付款方式</label>
    <input type="text" id="payment_method" name="payment_method" class="form-control">
    <input type="hidden" id="it_post" name="it_post" class="form-control">
    <legend><h3>新增項目</h3></legend>
    <table class="table" id="it_table">
      <tr>
        <td>物料編號</td>
        <td>名稱</td>
        <td>數量</td>
        <td>價錢</td>
        <td>總價</td>
      </tr>
      <tr>
        <td><input type="text" id="product_id" class="form-control"></td>
        <td><input type="text" id="name" class="form-control"></td>
        <td><input type="text" id="quantity" class="form-control"></td>
        <td><input type="text" id="price" class="form-control"></td>
        <td><input type="text" id="subtotal" class="form-control"></td>
      </tr>
      <tr>
        <td colspan="4"></td>
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
    obj.it.push({ product_id: $('#product_id').val(),name: $('#name').val(),quantity: $('#quantity').val(),price: $('#price').val(),subtotal: $('#subtotal').val() });
    $('#it_table').append('<tr><td>'+$('#product_id').val()+'</td><td>'+$('#name').val()+'</td><td>'+$('#quantity').val()+'</td><td>'+$('#price').val()+'</td><td>'+$('#subtotal').val()+'</td></tr>');
    $('#it_post').val(JSON.stringify(obj.it));
  });
});
</script>
@endsection

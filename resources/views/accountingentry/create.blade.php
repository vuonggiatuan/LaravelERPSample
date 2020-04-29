@extends('master')
@section('content')
<div class="container">
  <form method=post>
    <legend><h2>新增分錄</h2></legend>
    @if (session('status'))
      <div class="alert alert-success"> {{ session('status') }} </div>
    @endif
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <label for="reference_id">專案編號</label>
    <input type="text" id="reference_id" name="reference_id" class="form-control">
    <label for="dept">部門</label>
    <input type="text" id="dept" name="dept" class="form-control">
    <label for="purpose">目的</label>
    <input type="text" id="purpose" name="purpose" class="form-control">
    <label for="remark">備註</label>
    <textarea id="remark" name="remark" class="form-control"></textarea>
    <input type="hidden" id="it_post" name="it_post" class="form-control">
    <legend><h3>新增記錄</h3></legend>
    <table class="table" id="it_table">
      <tr>
        <td>內容</td>
        <td>借方</td>
        <td>貸方</td>
        <td>金額</td>
      </tr>
      <tr>
        <td><input type="text" id="content" class="form-control"></td>
        <td><input type="text" id="asset" class="form-control"></td>
        <td><input type="text" id="liability" class="form-control"></td>
        <td><input type="text" id="amount" class="form-control"></td>
      </tr>
      <tr>
        <td colspan="3"></td>
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
    obj.it.push({ content: $('#content').val(),asset: $('#asset').val(),liability: $('#liability').val(),amount: $('#amount').val() });
    $('#it_table').append('<tr><td>'+$('#content').val()+'</td><td>'+$('#asset').val()+'</td><td>'+$('#liability').val()+'</td><td>'+$('#amount').val()+'</td></tr>');
    $('#it_post').val(JSON.stringify(obj.it));
  });
});
</script>
@endsection

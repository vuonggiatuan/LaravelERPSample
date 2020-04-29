@extends('master')
@section('content')
<div class="container">
  <form method="post">
    <h3>Submit new record</h3>
    @if (session('status'))
      <div class="alert alert-success"> {{ session('status') }} </div>
    @endif
    @foreach ($errors->all() as $error)
      <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
    <div class="form-group">
      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
      <label for="content">Content</label>
      <input type="text" id="content" name="content" class="form-control">
      <label for="asset">Asset</label>
      <input type="text" id="asset" name="asset" class="form-control">
      <label for="liability">Liability</label>
      <input type="text" id="liability" name="liability" class="form-control">
      <label for="amount">Amount</label>
      <input type="text" id="amount" name="amount" class="form-control">
      <button class="btn btn-default">Cancel</button>
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
@endsection

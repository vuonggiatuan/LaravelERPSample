@extends('master')
@section('content')
<div class="container">
  <h2>Record-{!! $record->id !!}</h2>
  <table>
    <tr>
      <td>ID</td>
      <td>{!! $record->id !!}</td>
    </tr>
  </table>
</div>
@endsection

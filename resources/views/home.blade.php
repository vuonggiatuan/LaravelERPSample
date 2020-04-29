@extends('master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">儀錶板</div>

                <div class="panel-body">
                    歡迎<b>{{ Auth::user()->name }}</b>登入!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

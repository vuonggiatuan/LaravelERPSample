<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button> <a class="navbar-brand" href="#">ERP3.0</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">總帳<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{!! url('/accountingledger/ledgerlist'); !!}">科目列表</a></li>
            <li><a href="{!! url('/accountingledger/deptlist'); !!}">部門列表</a></li>
            <li><a href="{!! url('/accountingledger/budgetlist'); !!}">預算列表</a></li>
          </ul>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">會計記錄<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{!! url('/accountingrecord/submit'); !!}">新增交易</a></li>
            <li><a href="{!! url('/accountingrecord/index'); !!}">交易列表</a></li>
            <li><a href="{!! url('/accountingentry/create'); !!}">新增分錄</a></li>
            <li><a href="{!! url('/accountingentry/'); !!}">分錄列表</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">採購<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{!! url('/purchase/create'); !!}">新增</a></li>
            <li><a href="{!! url('/purchase');!!}">列表</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">倉儲<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{!! url('/inventory/stockmove'); !!}">倉儲異動記錄</a></li>
              <li><a href="{!! url('/inventory/storage'); !!}">倉儲列表</a></li>
            </ul>
          </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">生產<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{!! url('product/create'); !!}">新增產品資料</a></li>
            <li><a href="{!! url('product/neworder'); !!}">新增生產工單</a></li>
            <li class="divider"></li>
            <li><a href="{!! url('bom'); !!}">物料工單BOM</a></li>
            <li><a href="{!! url('product/orderlist'); !!}">生產工單列表</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">銷售<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{!! url('sale/create'); !!}">新增銷售訂單</a></li>
              <li><a href="{!! url('sale'); !!}">銷售訂單列表</a></li>
              <li class="divider"></li>
              <li><a href="{!! url('customer'); !!}">銷售訂單列表</a></li>
            </ul>
          </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">績效管理<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{!! url('bi/accounting'); !!}">財會績效</a></li>
              <li><a href="{!! url('bi/purchase'); !!}">採購績效</a></li>
              <li><a href="{!! url('bi/storage'); !!}">庫存績效</a></li>
              <li><a href="{!! url('bi/manufacture'); !!}">生產績效</a></li>
              <li><a href="{!! url('bi/product'); !!}">物料績效</a></li>
              <li><a href="{!! url('bi/sale'); !!}">銷售績效</a></li>
            </ul>
          </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">通告<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">通告列表</a></li>
              <li><a href="#">類型</a></li>
            </ul>
          </li>

        </ul>
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="搜尋">
          </div>
          <button type="submit" class="btn btn-default">搜尋</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">用戶管理<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{!! url('/users'); !!}">用戶列表</a></li>
              <li><a href="{!! url('/roles'); !!}">職能列表</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">使用者<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              @if (Auth::check())
              <li><a href="{!! url('/users/logout'); !!}">登出</a></li>
              @else
              <li><a href="{!! url('/users/register'); !!}">註冊</a></li>
              <li><a href="{!! url('/users/login'); !!}">登入</a></li>
              @endif

            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

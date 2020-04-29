@extends('master')
@section('content')
<div class="container">
  <legend><h1>物料產品分析</h1></legend>
  <select class="form-control" onchange="location=this.value;">
     <option>請選擇</option>
     @foreach($products as $product)
     <option  value="{!! url('/bi/productdetail', ['id' => $product->id]); !!}">{!! $product->name !!}</option>
     @endforeach
  </select>
  <div class="row">
    <div class="col-md-4"><div id="product_purchase" style="width: 100%;height:400px;"></div></div>
    <div class="col-md-4"><div id="product_production" style="width: 100%;height:400px;"></div></div>
    <div class="col-md-4"><div id="product_sale" style="width: 100%;height:400px;"></div></div>
    <div class="col-md-4"><div id="product_purchase2" style="width: 100%;height:400px;"></div></div>
    <div class="col-md-4"><div id="product_production2" style="width: 100%;height:400px;"></div></div>
    <div class="col-md-4"><div id="product_sale2" style="width: 100%;height:400px;"></div></div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.1.0/echarts-en.min.js"></script>
<script>
  var product_purchase = echarts.init(document.getElementById('product_purchase'));
  option_product_purchase = {
      title : {
        text: '物料採購量',
        x:'center'
      },
      color: ['#3398DB'],
      tooltip : {
          trigger: 'axis',
          axisPointer : {            // 坐标轴指示器，坐标轴触发有效
              type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
          }
      },
      grid: {
          left: '3%',
          right: '4%',
          bottom: '3%',
          containLabel: true
      },
      xAxis : [
          {
              type : 'category',
              data : [@foreach($purchase as $item) '{!! $item->product_name!!}', @endforeach],
              axisTick: {
                  alignWithLabel: true
              }
          }
      ],
      yAxis : [
          {
              type : 'value'
          }
      ],
      series : [
          {
              name:'量',
              type:'bar',
              barWidth: '60%',
              data:[@foreach($purchase as $item) {!! $item->quantity!!}, @endforeach]
          }
      ]
  };
  product_purchase.setOption(option_product_purchase);
</script>
<script>
  var product_purchase2 = echarts.init(document.getElementById('product_purchase2'));
  option_product_purchase2 = {
      title : {
        text: '物料採購金額',
        x:'center'
      },
      color: ['#3398DB'],
      tooltip : {
          trigger: 'axis',
          axisPointer : {            // 坐标轴指示器，坐标轴触发有效
              type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
          }
      },
      grid: {
          left: '3%',
          right: '4%',
          bottom: '3%',
          containLabel: true
      },
      xAxis : [
          {
              type : 'category',
              data : [@foreach($purchase as $item) '{!! $item->product_name!!}', @endforeach],
              axisTick: {
                  alignWithLabel: true
              }
          }
      ],
      yAxis : [
          {
              type : 'value'
          }
      ],
      series : [
          {
              name:'金額',
              type:'bar',
              barWidth: '60%',
              data:[@foreach($purchase as $item) {!! $item->sum!!}, @endforeach]
          }
      ]
  };
  product_purchase2.setOption(option_product_purchase2);
</script>
<script>
  var product_production = echarts.init(document.getElementById('product_production'));
  option_product_production = {
      title : {
        text: '物料生產量',
        x:'center'
      },
      color: ['#006313'],
      tooltip : {
          trigger: 'axis',
          axisPointer : {            // 坐标轴指示器，坐标轴触发有效
              type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
          }
      },
      grid: {
          left: '3%',
          right: '4%',
          bottom: '3%',
          containLabel: true
      },
      xAxis : [
          {
              type : 'category',
              data : [@foreach($production as $item) '{!! $item->product_name!!}', @endforeach],
              axisTick: {
                  alignWithLabel: true
              }
          }
      ],
      yAxis : [
          {
              type : 'value'
          }
      ],
      series : [
          {
              name:'量',
              type:'bar',
              barWidth: '60%',
              data:[@foreach($production as $item) {!! $item->quantity!!}, @endforeach]
          }
      ]
  };
  product_production.setOption(option_product_production);
</script>
<script>
  var product_production2 = echarts.init(document.getElementById('product_production2'));
  option_product_production2 = {
      title : {
        text: '物料生產金額',
        x:'center'
      },
      color: ['#006313'],
      tooltip : {
          trigger: 'axis',
          axisPointer : {            // 坐标轴指示器，坐标轴触发有效
              type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
          }
      },
      grid: {
          left: '3%',
          right: '4%',
          bottom: '3%',
          containLabel: true
      },
      xAxis : [
          {
              type : 'category',
              data : [@foreach($production as $item) '{!! $item->product_name!!}', @endforeach],
              axisTick: {
                  alignWithLabel: true
              }
          }
      ],
      yAxis : [
          {
              type : 'value'
          }
      ],
      series : [
          {
              name:'金額',
              type:'bar',
              barWidth: '60%',
              data:[@foreach($production as $item) {!! $item->sum!!}, @endforeach]
          }
      ]
  };
  product_production2.setOption(option_product_production2);
</script>
<script>
  var product_sale = echarts.init(document.getElementById('product_sale'));
  option_product_sale = {
      title : {
        text: '物料銷貨量',
        x:'center'
      },
      color: ['#630900'],
      tooltip : {
          trigger: 'axis',
          axisPointer : {            // 坐标轴指示器，坐标轴触发有效
              type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
          }
      },
      grid: {
          left: '3%',
          right: '4%',
          bottom: '3%',
          containLabel: true
      },
      xAxis : [
          {
              type : 'category',
              data : [@foreach($sale as $item) '{!! $item->product_name!!}', @endforeach],
              axisTick: {
                  alignWithLabel: true
              }
          }
      ],
      yAxis : [
          {
              type : 'value'
          }
      ],
      series : [
          {
              name:'量',
              type:'bar',
              barWidth: '60%',
              data:[@foreach($sale as $item) {!! $item->quantity!!}, @endforeach]
          }
      ]
  };
  product_sale.setOption(option_product_sale);
</script>
<script>
  var product_sale2 = echarts.init(document.getElementById('product_sale2'));
  option_product_sale2 = {
      title : {
        text: '物料銷貨金額',
        x:'center'
      },
      color: ['#630900'],
      tooltip : {
          trigger: 'axis',
          axisPointer : {            // 坐标轴指示器，坐标轴触发有效
              type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
          }
      },
      grid: {
          left: '3%',
          right: '4%',
          bottom: '3%',
          containLabel: true
      },
      xAxis : [
          {
              type : 'category',
              data : [@foreach($sale as $item) '{!! $item->product_name!!}', @endforeach],
              axisTick: {
                  alignWithLabel: true
              }
          }
      ],
      yAxis : [
          {
              type : 'value'
          }
      ],
      series : [
          {
              name:'金額',
              type:'bar',
              barWidth: '60%',
              data:[@foreach($sale as $item) {!! $item->sum!!}, @endforeach]
          }
      ]
  };
  product_sale2.setOption(option_product_sale2);
</script>
@endsection

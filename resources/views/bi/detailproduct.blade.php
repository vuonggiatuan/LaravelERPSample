@extends('master')
@section('content')
<div class="container">
  <legend><h1>{!! $product->name!!}-物料分析</h1></legend>
  <legend><h3>採購</h3></legend>
  <div class="row">
    <div class="col-md-4"><div id="purchase_cost" style="width: 100%;height:400px;"></div></div>
    <div class="col-md-4"><div id="purchase_quantity" style="width: 100%;height:400px;"></div></div>
    <div class="col-md-4"><div id="purchase_total" style="width: 100%;height:400px;"></div></div>
  </div>
  <legend><h3>生產</h3></legend>
  <div class="row">
    <div class="col-md-4"><div id="production_cost" style="width: 100%;height:400px;"></div></div>
    <div class="col-md-4"><div id="production_quantity" style="width: 100%;height:400px;"></div></div>
    <div class="col-md-4"><div id="production_total" style="width: 100%;height:400px;"></div></div>
  </div>
  <legend><h3>銷售</h3></legend>
  <div class="row">
    <div class="col-md-4"><div id="sale_cost" style="width: 100%;height:400px;"></div></div>
    <div class="col-md-4"><div id="sale_quantity" style="width: 100%;height:400px;"></div></div>
    <div class="col-md-4"><div id="sale_total" style="width: 100%;height:400px;"></div></div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.1.0/echarts-en.min.js"></script>
<script>
  var purchase_cost = echarts.init(document.getElementById('purchase_cost'));
  option_purchase_cost = {
      title : {
        text: '物料採購價格',
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
              data : [@foreach($purchase as $item) '{!! $item->year."/".$item->month!!}', @endforeach],
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
              name:'直接访问',
              type:'bar',
              barWidth: '60%',
              data:[@foreach($purchase as $item) {!! $item->price!!}, @endforeach]
          }
      ]
  };
  purchase_cost.setOption(option_purchase_cost);
</script>
<script>
  var purchase_quantity = echarts.init(document.getElementById('purchase_quantity'));
  option_purchase_quantity = {
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
              data : [@foreach($purchase as $item) '{!! $item->year."/".$item->month!!}', @endforeach],
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
              name:'直接访问',
              type:'bar',
              barWidth: '60%',
              data:[@foreach($purchase as $item) {!! $item->quantity!!}, @endforeach]
          }
      ]
  };
  purchase_quantity.setOption(option_purchase_quantity);
</script>
<script>
  var purchase_total = echarts.init(document.getElementById('purchase_total'));
  option_purchase_total = {
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
              data : [@foreach($purchase as $item) '{!! $item->year."/".$item->month!!}', @endforeach],
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
              name:'直接访问',
              type:'bar',
              barWidth: '60%',
              data:[@foreach($purchase as $item) {!! $item->quantity*$item->price!!}, @endforeach]
          }
      ]
  };
  purchase_total.setOption(option_purchase_total);
</script>
<script>
  var production_cost = echarts.init(document.getElementById('production_cost'));
  option_production_cost = {
      title : {
        text: '生產單位成本',
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
              data : [@foreach($production as $item) '{!! $item->year."/".$item->month!!}', @endforeach],
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
              name:'直接访问',
              type:'bar',
              barWidth: '60%',
              data:[@foreach($production as $item) {!! $item->price!!}, @endforeach]
          }
      ]
  };
  production_cost.setOption(option_production_cost);
</script>
<script>
  var production_quantity = echarts.init(document.getElementById('production_quantity'));
  option_production_quantity = {
      title : {
        text: '產量',
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
              data : [@foreach($production as $item) '{!! $item->year."/".$item->month!!}', @endforeach],
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
              name:'直接访问',
              type:'bar',
              barWidth: '60%',
              data:[@foreach($production as $item) {!! $item->quantity!!}, @endforeach]
          }
      ]
  };
  production_quantity.setOption(option_production_quantity);
</script>
<script>
  var production_total = echarts.init(document.getElementById('production_total'));
  option_production_total = {
      title : {
        text: '生產價值',
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
              data : [@foreach($production as $item) '{!! $item->year."/".$item->month!!}', @endforeach],
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
              name:'直接访问',
              type:'bar',
              barWidth: '60%',
              data:[@foreach($production as $item) {!! $item->price*$item->quantity!!}, @endforeach]
          }
      ]
  };
  production_total.setOption(option_production_total);
</script>
<script>
  var sale_cost = echarts.init(document.getElementById('sale_cost'));
  option_sale_cost = {
      title : {
        text: '銷貨價格',
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
              data : [@foreach($sale as $item) '{!! $item->year."/".$item->month!!}', @endforeach],
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
              name:'直接访问',
              type:'bar',
              barWidth: '60%',
              data:[@foreach($sale as $item) {!! $item->price!!}, @endforeach]
          }
      ]
  };
  sale_cost.setOption(option_sale_cost);
</script>
<script>
  var sale_quantity = echarts.init(document.getElementById('sale_quantity'));
  option_sale_quantity = {
      title : {
        text: '銷貨量',
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
              data : [@foreach($sale as $item) '{!! $item->year."/".$item->month!!}', @endforeach],
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
              name:'直接访问',
              type:'bar',
              barWidth: '60%',
              data:[@foreach($sale as $item) {!! $item->quantity!!}, @endforeach]
          }
      ]
  };
  sale_quantity.setOption(option_sale_quantity);
</script>
<script>
  var sale_total = echarts.init(document.getElementById('sale_total'));
  option_sale_total = {
      title : {
        text: '生產價值',
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
              data : [@foreach($sale as $item) '{!! $item->year."/".$item->month!!}', @endforeach],
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
              name:'直接访问',
              type:'bar',
              barWidth: '60%',
              data:[@foreach($sale as $item) {!! $item->price*$item->quantity!!}, @endforeach]
          }
      ]
  };
  sale_total.setOption(option_sale_total);
</script>
@endsection

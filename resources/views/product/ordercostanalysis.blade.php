@extends('master')
@section('content')
<div class="container">
  <legend><h1>{!! $order->id !!}工單成本分析</h1></legend>
  <table class="table table-bordered">
    <tr>
      <td align="center">項目</td>
      <td align="center">實際</td>
      <td align="center">預計</td>
      <td align="center">差異</td>
    </tr>
    <tr>
      <td>直接材料</td>
      <td align="right">{!! number_format($sum_material)!!}</td>
      <td align="right">{!! number_format($order->material_budget)!!}</td>
      <td align="center">{!! round($sum_material*100/$order->material_budget,2)!!}%</td>
    </tr>
    <tr>
      <td>製造成本</td>
      <td align="right">{!! number_format($sum_manufacture_cost)!!}</td>
      <td align="right">{!! number_format($order->manufacture_budget)!!}</td>
      <td align="center">{!! round($sum_manufacture_cost*100/$order->manufacture_budget,2)!!}%</td>
    </tr>
    <tr>
      <td>人力成本</td>
      <td align="right">{!! number_format($sum_labor_cost)!!}</td>
      <td align="right">{!! number_format($order->labor_budget)!!}</td>
      <td align="center">{!! round($sum_labor_cost*100/$order->labor_budget,2)!!}%</td>
    </tr>
    <tr>
      <td>產量</td>
      <td align="right">{!! number_format($order->quantity)!!}</td>
      <td align="right">{!! number_format($order->planned_quantity)!!}</td>
      <td align="center">{!! round($order->quantity*100/$order->planned_quantity,2)!!}%</td>
    </tr>
    <tr>
      <td>總成本</td>
      <td align="right">{!! number_format($sum_labor_cost+$sum_material+$sum_labor_cost)!!}</td>
      <td align="right">{!! number_format($order->material_budget+$order->manufacture_budget+$order->labor_budget)!!}</td>
      <td align="center">{!! round(($sum_labor_cost+$sum_material+$sum_labor_cost)*100/($order->material_budget+$order->manufacture_budget+$order->labor_budget),2)!!}%</td>
    </tr>
    <tr>
      <td>單位成本</td>
      <td align="right">{!! number_format(($sum_labor_cost+$sum_material+$sum_labor_cost)/$order->quantity)!!}</td>
      <td align="right">{!! number_format(($order->material_budget+$order->manufacture_budget+$order->labor_budget)/$order->planned_quantity)!!}</td>
      <td align="center">{!! round((($sum_labor_cost+$sum_material+$sum_labor_cost)/$order->quantity)*100/(($order->material_budget+$order->manufacture_budget+$order->labor_budget)/$order->planned_quantity),2)!!}%</td>
    </tr>
  </table>
  <div id="cost_pie" style="width: 100%;height:600px;"></div>
  <div id="cost_bar" style="width: 100%;height:600px;"></div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.1.0/echarts-en.min.js"></script>
<script>
var cost_pie = echarts.init(document.getElementById('cost_pie'));
var cost_bar = echarts.init(document.getElementById('cost_bar'));
option = {
    title : {
        text: '工單成本分析',
        subtext: '工單-{{!! $order->id!!}}',
        x:'center'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        left: 'left',
        data: ['直接材料','製造成本','人力成本']
    },
    toolbox: {
        feature: {
            dataView: {show: true, readOnly: false},
            magicType: {show: true, type: ['line', 'bar']},
            restore: {show: true},
            saveAsImage: {show: true}
        }
    },
    series : [
        {
            name: '访问来源',
            type: 'pie',
            radius : '55%',
            center: ['50%', '60%'],
            data:[
                {value:{!! $sum_material!!}, name:'直接材料'},
                {value:{!! $sum_manufacture_cost!!}, name:'製造成本'},
                {value:{!! $sum_labor_cost!!}, name:'人力成本'},
            ],
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }
    ]
};

cost_pie.setOption(option);
option2 = {
  color:['#4286f4','#000000'],
  title : {
      text: '工單成本分析',
      subtext: '工單-{{!! $order->id!!}}',
      x:'left'
  },
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'cross',
            crossStyle: {
                color: '#888'
            }
        }
    },
    toolbox: {
        feature: {
            dataView: {show: true, readOnly: false},
            magicType: {show: true, type: ['line', 'bar']},
            restore: {show: true},
            saveAsImage: {show: true}
        }
    },
    legend: {
        data:['績效','水平']
    },
    xAxis: [
        {
            type: 'category',
            data: ['物料成本','製造成本','人力成本','總成本','產量','單位成本'],
            axisPointer: {
                type: 'shadow'
            }
        }
    ],
    yAxis: [
        {
            type: 'value',
            name: '績效',
            min: 0,
            max: 120,
            interval: 50,
            axisLabel: {
                formatter: '{value}'
            }
        },
        {
            type: 'value',
            name: '水平',
            min: 0,
            max: 120,
            interval: 5,
            axisLabel: {
                formatter: '{value}'
            }
        }
    ],
    series: [
        {
            name:'績效',
            type:'bar',
            data:[{!! round($sum_material*100/$order->material_budget,2)!!},
              {!! round($sum_manufacture_cost*100/$order->manufacture_budget,2)!!},
              {!! round($sum_labor_cost*100/$order->labor_budget,2)!!},
              {!! round(($sum_labor_cost+$sum_material+$sum_labor_cost)*100/($order->material_budget+$order->manufacture_budget+$order->labor_budget),2)!!},
              {!! round($order->quantity*100/$order->planned_quantity,2)!!},
              {!! round((($sum_labor_cost+$sum_material+$sum_labor_cost)/$order->quantity)*100/(($order->material_budget+$order->manufacture_budget+$order->labor_budget)/$order->planned_quantity),2)!!}]
        },
        {
            name:'水平',
            type:'line',
            data:[100, 100, 100, 100, 100, 100]
        },
    ]
};
cost_bar.setOption(option2);
  </script>
@endsection

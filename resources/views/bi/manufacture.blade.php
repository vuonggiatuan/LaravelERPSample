@extends('master')
@section('content')
<?
  $sum_material=0;
  $sum_manufacture=0;
  $sum_labor=0;
  foreach($labor_cost as $item){ $sum_labor=$sum_labor+$item->sum; }
  foreach($manufacture_cost as $item){ $sum_manufacture=$sum_manufacture+$item->sum; }
  foreach($material_cost as $item){ $sum_material=$sum_material+$item->sum; }
  foreach($production_budget as $item){$budget[''.$item->ledger_id]=$item->budget;}
?>
<div class="container">
  <legend><h1>2018年度產品單位成本分析表</h1></legend>
  <div class="row">
    <div class="col-md-4"><div id="manufacture_cost" style="width: 100%;height:400px;"></div></div>
    <div class="col-md-4"><div id="labor_cost" style="width: 100%;height:400px;"></div></div>
    <div class="col-md-4"><div id="material_cost" style="width: 100%;height:400px;"></div></div>
    <div class="col-md-4"><div id="production_cost" style="width: 100%;height:400px;"></div></div>
    <div class="col-md-4"><div id="cost_pie" style="width: 100%;height:400px;"></div></div>
    <div class="col-md-4"><div id="cost_budget" style="width: 100%;height:400px;"></div></div>
  </div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>產品名稱</th>
        <th>直接原料</th>
        <th>%</th>
        <th>製造費用</th>
        <th>%</th>
        <th>直接人工</th>
        <th>%</th>
        <th>托外代工</th>
        <th>%</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>A產品</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>
  <div id="container">
		<canvas id="canvas"></canvas>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.1.0/echarts-en.min.js"></script>
<script>

		var MONTHS = ['A產品', 'B產品', 'C產品', 'D產品', 'E產品', 'F產品', 'G產品', 'H產品', 'September', 'October', 'November', 'December'];
		//var color = Chart.helpers.color;
		var barChartData = {
			labels: ['A產品', 'B產品', 'C產品', 'D產品', 'E產品', 'F產品', 'G產品'],
			datasets: [{
				label: '直接材料',
				backgroundColor: 'rgba(255, 99, 132,0.5)',
				borderColor: 'rgb(255, 99, 132)',
				borderWidth: 1,
				data: [
					123,
					150,
					160,
					189,
					232,
					200,
				  250
				]
			}, {
				label: '製造費用',
				backgroundColor: 'rgba(54, 162, 235,0.5)',
				borderColor: 'rgb(54, 162, 235)',
				borderWidth: 1,
				data: [
          13,
					17,
					15,
					20,
					20,
					13,
				  20
				]
			}, {
				label: '直接人工',
				backgroundColor: 'rgba(201, 203, 207,0.5)',
				borderColor: 'rgb(201, 203, 207)',
				borderWidth: 1,
				data: [
          83,
					57,
					65,
					00,
					50,
					23,
				  70
				]
			}, {
				label: '托外代工',
				backgroundColor: 'rgba(255, 159, 64,0.5)',
				borderColor: 'rgb(255, 159, 64)',
				borderWidth: 1,
				data: [
          18,
					15,
					16,
					20,
					25,
					22,
				  27
				]
			}]

		};
    window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myBar = new Chart(ctx, {
				type: 'bar',
				data: barChartData,
				options: {
					responsive: true,
					legend: {
						position: 'top',
					},
					title: {
						display: true,
						text: '產品單位成本分析'
					},
					tooltips: {
						mode: 'index',
						intersect: false
					},
					responsive: true,
					scales: {
						xAxes: [{
							stacked: true,
						}],
						yAxes: [{
							stacked: true
						}]
					}
				}
			});

		};
</script>
<script>
  var manufacture_cost = echarts.init(document.getElementById('manufacture_cost'));
  option_manufacture_cost = {
      title : {
        text: '製造成本',
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
              data : [@foreach($manufacture_cost as $item) '{!! $item->year."/".$item->month!!}', @endforeach],
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
              data:[@foreach($manufacture_cost as $item) {!! $item->sum!!}, @endforeach]
          }
      ]
  };
  manufacture_cost.setOption(option_manufacture_cost);
</script>
<script>
  var labor_cost = echarts.init(document.getElementById('labor_cost'));
  option_labor_cost = {
      title : {
        text: '人力成本',
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
              data : [@foreach($labor_cost as $item) '{!! $item->year."/".$item->month!!}', @endforeach],
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
              data:[@foreach($labor_cost as $item) {!! $item->sum!!}, @endforeach]
          }
      ]
  };
  labor_cost.setOption(option_labor_cost);
</script>
<script>
  var material_cost = echarts.init(document.getElementById('material_cost'));
  option_material_cost = {
      title : {
        text: '物料成本',
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
              data : [@foreach($material_cost as $item) '{!! $item->year."/".$item->month!!}', @endforeach],
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
              data:[@foreach($material_cost as $item) {!! $item->sum!!}, @endforeach]
          }
      ]
  };
  material_cost.setOption(option_material_cost);
</script>
<script>
  var production_cost = echarts.init(document.getElementById('production_cost'));
  option_production_cost = {
      title : {
        text: '成品製造',
        x:'center'
      },
      color: ['#ff1c00'],
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
              data : [@foreach($production_cost as $item) '{!! $item->year."/".$item->month!!}', @endforeach],
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
              data:[@foreach($production_cost as $item) {!! $item->sum!!}, @endforeach]
          }
      ]
  };
  production_cost.setOption(option_production_cost);
</script>
<script>
  var cost_pie = echarts.init(document.getElementById('cost_pie'));
  option_cost_pie = {
      title : {
          text: '生產成本分析',
          subtext: '',
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
              name: '生產工單統計',
              type: 'pie',
              radius : '55%',
              center: ['50%', '60%'],
              data:[
                  {value:{!! $sum_material!!}, name:'直接材料'},
                  {value:{!! $sum_manufacture!!}, name:'製造成本'},
                  {value:{!! $sum_labor!!}, name:'人力成本'},
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

  cost_pie.setOption(option_cost_pie);
</script>
<script>
  var cost_budget = echarts.init(document.getElementById('cost_budget'));
  option_cost_budget = {
      title : {
        text: '預算使用剩餘',
        x:'center'
      },
      color: ['#ff1c00'],
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
              data : ['直接材料','人力成本','製造成本'],
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
              name:'預算使用',
              type:'bar',
              barWidth: '60%',
              data:[{!!($sum_material-$budget['510102'])*-100/$budget['510102']!!},
              {!!($sum_labor-$budget['510103'])*-100/$budget['510103']!!},
              {!!($sum_manufacture-$budget['510104'])*-100/$budget['510104']!!}]
          }
      ]
  };
  cost_budget.setOption(option_cost_budget);
</script>
@endsection

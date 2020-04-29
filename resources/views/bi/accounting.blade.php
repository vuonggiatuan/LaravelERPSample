@extends('master')
@section('content')
<div class="container">
  <legend><h3>2018/12月預算-收入差異損益表</h3></legend>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>科目代碼</th>
        <th>科目名稱</th>
        <th>預算</th>
        <th>實際</th>
        <th>差異金額</th>
        <th>差異率(%)</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>4101</td>
        <td>售貨收入</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>4102</td>
        <td>售貨退回</td>
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
<script>

		var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		//var color = Chart.helpers.color;
		var barChartData = {
			labels: ['一月', '二月', '三月', '四月', '五月', '六月', '七月'],
			datasets: [{
				label: '現金科目',
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
				label: '銀行存款',
				backgroundColor: 'rgba(54, 162, 235,0.5)',
				borderColor: 'rgb(54, 162, 235)',
				borderWidth: 1,
				data: [
          183,
					157,
					165,
					200,
					250,
					223,
				  270
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
						text: '流動資產統計表'
					}
				}
			});

		};
</script>
@endsection

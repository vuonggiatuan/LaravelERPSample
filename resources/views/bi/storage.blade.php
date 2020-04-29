@extends('master')
@section('content')
<div class="container">
<div id="main" style="width: 600px;height:400px;"></div>
<div id="quality_gauge_styling" style="width: 600px;height:400px;"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.1.0/echarts-en.min.js"></script>
<script>
          var quality_gauge_styling = echarts.init(document.getElementById('quality_gauge_styling'));

          option = {
              tooltip : {
                  formatter: "{a} <br/>{b} : {c}%"
              },
              toolbox: {
                  feature: {
                      restore: {},
                      saveAsImage: {}
                  }
              },
              series: [
                  {
                      name: '庫存存貨量',
                      type: 'gauge',
                      detail: {formatter:'{value}%'},
                      data: [{value: 50, name: '退貨率'}]
                  }
              ]
          };

          setInterval(function () {
              option.series[0].data[0].value = (Math.random() * 100).toFixed(2) - 0;
              quality_gauge_styling.setOption(option, true);
          },2000);

          quality_gauge_styling.setOption(option);
    </script>
@endsection

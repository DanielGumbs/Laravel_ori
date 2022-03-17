<!DOCTYPE html>
<html lang="en">
<head>
    <br>
    <title>Pie Chart Integration in Laravel 8</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>--}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>
<body>
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="p-6 mt-2 bg-white rounded shadow">
        <div class="flex justify-between ">
            <h2 class="text-2xl">HighCharts Grafiek</h2>
        </div>
    <br>
        <div class="panel-body">
            <div id="pie-chart"></div>
        </div>
        <div id="container"></div>
        </div>
</div>
<script>
    $(function() {
        Highcharts.chart('pie-chart', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Hoeveel opleidingen per docent'
            },
            tooltip: {
                pointFormat: 'Opleiding: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>Opleidingen</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Browsers',
                colorByPoint: true,
                data:  {!! $data !!}
            }]
        });
    });
    </script>
    <script>
        var userData = JSON.parse('{!!$userData!!}');
        var array = [];
        Object.keys(userData).forEach(key => array.push([key, userData[key]]));
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            xAxis: {
                type: 'category',
                labels: {
                    rotation: -45,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Opleidingen per docent'
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: 'Opleidingen: <b>{point.y:.1f}</b>'
            },
            series: [{
                name: 'Population',
                data: array,
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    align: 'right',
                    format: '{point.y:.1f}', // one decimal
                    y: 10, // 10 pixels down from the top
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]
        });
</script>
</body>

</html>

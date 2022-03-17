<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chartisan example</title>
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
</head>
<body>
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="p-6 mt-2 bg-white rounded shadow">
        <div class="flex justify-between ">
            <h2 class="text-2xl">HighCharts Grafiek</h2>
        </div>
        <div id="chart" style="height: 300px;"></div>
    </div>
</div>
<script>
    const chart = new Chartisan({
        el: '#chart',
        url: "@chart('c3chart')",
    })
</script>
</body>
</html>

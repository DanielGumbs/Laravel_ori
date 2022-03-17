<div>
    <div class="flex mt-6 ml-4 justify-center">
        <h2 class="text-2xl">Overzicht Grafieken Chart-js</h2>
    </div>
    <div class="grid grid-cols-2 gap-12 p-20">
        <div class="ml-4">
            <div class="w-48 mb-4">
                <label for="category_grafiek" class="block text-gray-700 text-sm font-bold mb-2">Categorie</label>
                <select name="category_id" wire:model="category_grafiek" id="category_grafiek" class="block shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><option value="">Alle categorieën</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="p-2 bg-white rounded shadow" wire:ignore><canvas id="pie-chart"></canvas></div>
        </div>
        <div class="mr-4">
            <div class="w-48 mb-4">
                <label for="teacher_grafiek" class="block text-gray-700 text-sm font-bold mb-2">Docent</label>
                <select name="teacher_id" wire:model="teacher_grafiek" id="teacher_grafiek" class="block shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><option value="">Alle docenten</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="p-2 bg-white rounded shadow" wire:ignore><canvas id="bar-chart"></canvas></div>
        </div>
        <div class="ml-4">
            <div class="flex items-center">
                <div class="mr-4 mb-4">
                    <label for="category_dropdown" class="block text-gray-700 text-sm font-bold mb-2">Categorie</label>
                    <select name="category_id" wire:model="category_dropdown" id="category_dropdown" class="block shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><option value="">Alle categorieën</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mr-4 mb-4">
                    <label for="Opleiding" class="block text-gray-700 text-sm font-bold mb-2">Opleiding</label>
                    <input wire:model="search" type="search" placeholder="Zoek op opleiding..." class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mr-4 mb-4">
                    <label for="teacher_dropdown" class="block text-gray-700 text-sm font-bold mb-2">Docent</label>
                    <select name="teacher_id" wire:model="teacher_dropdown" id="teacher_dropdown" class="block shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><option value="">Alle docenten</option>
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="p-4 bg-white rounded shadow" wire:ignore><canvas id="line-chart"></canvas></div>
        </div>
        <div class="mr-4">
            <div class="w-48 mb-4 mb-4">
                <label for="Opleiding" class="block text-gray-700 text-sm font-bold mb-2">Opleiding</label>
                <input wire:model="search2" type="search" placeholder="Zoek op opleiding..." class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="p-2 bg-white rounded shadow" wire:ignore><canvas id="polarArea"></canvas></div>
        </div>
    </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
            <script>
                $(function(){
                    var cData = JSON.parse(`<?php echo $teachers_chart; ?>`);
                    var ctx = $("#pie-chart");
                    var data = {
                        labels: cData.label,
                        datasets: [
                            {
                                label: "Opleidingen",
                                data: cData.data,
                                backgroundColor: [
                                    '#ADFF2F', '#7FFF00', '#5ed403', '#00FF00', '#32CD32',  '#98FB98',	 '#90EE90',  '#00FF7F',
                                    '#3CB371',  '#2E8B57', '#228B22', '#9ACD32', '#66CDAA'
                                      ],
                                borderColor: [
                                    '#7FFF00', '#ADFF2F', '#7CFC00', '#00FF00', '#32CD32',  '#98FB98',	 '#90EE90',  '#00FF7F',
                                    '#3CB371',  '#2E8B57', '#228B22', '#9ACD32', '#66CDAA'
                                ],
                                borderWidth: [1, 1, 1, 1, 1,1,1]
                            }
                        ]
                    };
                    var options = {
                        responsive: true,
                        title: {
                            display: true,
                            position: "top",
                            text: "" + "",
                            fontSize: 18,
                            fontColor: "#111"
                        },
                        legend: {
                            display: true,
                            position: "bottom",
                            labels: {
                                fontColor: "#333",
                                fontSize: 16
                            }
                        }
                    };

                    var chart1 = new Chart(ctx, {
                        type: "pie",
                        data: data,
                        options: {
                            responsive: true,
                            title: {
                                display: true,
                                text: 'Opleiding per docent'
                            }
                        },
                    });
                    @this.on(`refreshChartTeacherData`, (teachers_chart) => {
                        chart1.data.labels = teachers_chart.data.label;
                        chart1.data.datasets.forEach((dataset) => {
                            dataset.data = teachers_chart.data.data;
                        });
                        chart1.update();
                    });

                    var bData = JSON.parse(`<?php echo $categories_chart; ?>`);
                    var btx = $("#bar-chart");
                    var data2 = {
                        labels: bData.label,
                        datasets: [
                            {
                                label: "Opleidingen",
                                data: bData.data,
                                backgroundColor: [
                                    '#ADFF2F', '#3CB371', '#9ACD32', '#218B22', '#7FFF00',  '#66CDAA',	 '#90EE90',  '#00FF7F',
                                    '#2E8B57',  '#00FF00', '#98FB98', '#7CFC00', '#32CD32'
                                ],
                                borderColor: [
                                    '#ADFF2F', '#7FFF00', '#7CFC00', '#00FF00', '#32CD32',  '#98FB98',	 '#00FF7F',  '#90EE90',
                                    '#3CB371',  '#2E8B57', '#228B22', '#9ACD32', '#66CDAA'
                                ],
                                borderWidth: [1, 1, 1, 1, 1,1,1]
                            }
                        ]
                    };
                    var options = {
                        scales: {
                            yAxes: [{
                                display: true,
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        },
                        responsive: true,
                        title: {
                            display: true,
                            position: "top",
                            text: "" + "",
                            fontSize: 18,
                            fontColor: "#111",
                        },
                        legend: {
                            display: false,
                            position: "bottom",
                            labels: {
                                fontColor: "#333",
                                fontSize: 16
                            }
                        }
                    };

                    var chart2 = new Chart(btx, {
                        type: "bar",
                        data: data2,
                        options: {
                            responsive: true,
                            title: {
                                display: true,
                                text: 'Opleiding per categorie'
                            }
                        },
                    });
                @this.on(`refreshChartCategoryData`, (categories_chart) => {
                    // chart2.data.labels = categories_chart.data.label;
                    chart2.data.datasets.forEach((dataset) => {
                        dataset.data = categories_chart.data.data;
                    });
                    chart2.update();
                });

                var aData = JSON.parse(`<?php echo $date_chart; ?>`);
                console.log(aData);
                var atx = $("#line-chart");
                var data3 = {
                    labels: aData.label,
                    datasets: [
                        {
                            label: "Opleidingen",
                            data: aData.data,
                            borderColor: "#2E8B57",
                            fill: false,
                        }
                    ]
                };
                var options = {
                    scales: {
                        yAxes: [{
                            display: true,
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    responsive: true,
                    title: {
                        display: true,
                        position: "top",
                        text: "" + "",
                        fontSize: 18,
                        fontColor: "#111",
                    },
                    legend: {
                        display: false,
                        position: "bottom",
                        labels: {
                            fontColor: "#111",
                            fontSize: 16
                        }
                    }
                };

                var chart3 = new Chart(atx, {
                        type: 'line',
                        data: data3,
                        options: {
                            responsive: true,
                                title: {
                                    display: true,
                                    text: 'Opleiding per maand'
                                }
                        },
                });
                    @this.on(`refreshChartDateData`, (date_chart) => {
                        // chart3.data.labels = date_chart.data.label;
                        chart3.data.datasets.forEach((dataset) => {
                            dataset.data = date_chart.data.data;
                        });
                        chart3.update();
                    });

                    var dData = JSON.parse(`<?php echo $date_chart; ?>`);
                    var dtx = $("#polarArea");
                    var data4 = {
                        labels: dData.label,
                        datasets: [
                            {
                                label: "Opleidingen",
                                data: dData.data,
                                backgroundColor: [
                                    '#ADFF2F', '#7FFF00', '#5ed403', '#00FF00', '#32CD32',  '#98FB98',	 '#90EE90',  '#00FF7F',
                                    '#3CB371',  '#2E8B57', '#228B22', '#9ACD32', '#66CDAA'
                                ],
                                borderColor: [
                                    '#7FFF00', '#ADFF2F', '#7CFC00', '#00FF00', '#32CD32',  '#98FB98',	 '#90EE90',  '#00FF7F',
                                    '#3CB371',  '#2E8B57', '#228B22', '#9ACD32', '#66CDAA'
                                ],
                                fill: false,
                            }
                        ]
                    };
                    var options = {
                        scales: {
                            yAxes: [{
                                display: true,
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        },
                        responsive: true,
                        title: {
                            display: true,
                            position: "top",
                            text: "" + "",
                            fontSize: 18,
                            fontColor: "#111",
                        },
                        legend: {
                            display: false,
                            position: "bottom",
                            labels: {
                                fontColor: "#111",
                                fontSize: 16
                            }
                        }
                    };

                    var chart4 = new Chart(dtx, {
                        type: 'polarArea',
                        data: data4,
                        options: {
                            responsive: true,
                            title: {
                                display: true,
                                text: 'Opleiding per maand'
                            }
                        },
                    });
                    @this.on(`refreshChartDate2Data`, (date_chart2) => {
                        chart4.data.datasets.forEach((dataset) => {
                            dataset.data = date_chart2.data.data;
                        });
                        chart4.update();
                    });
                });
            </script>
</div>

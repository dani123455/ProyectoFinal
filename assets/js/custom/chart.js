        document.addEventListener("DOMContentLoaded", function() {
            var options = {
                series: [44, 55, 13, 43, 22],
                chart: {
                    width: 380,
                    type: 'pie'
                },
                labels: ['Audi', 'BMW', 'Mercedes', 'Volkswagen', 'Renault'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        
            var options2 = {
                series: [{
                    name: 'Low-end',
                    data: [44, 55, 41, 67, 22, 43, 21, 49]
                }, {
                    name: 'Mid-range',
                    data: [13, 23, 20, 8, 13, 27, 33, 12]
                }, {
                    name: 'High-end',
                    data: [11, 17, 15, 15, 21, 14, 15, 13]
                }],
                chart: {
                    type: 'bar',
                    height: 350,
                    stacked: true,
                    stackType: '100%'
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        legend: {
                            position: 'bottom',
                            offsetX: -10,
                            offsetY: 0
                        }
                    }
                }],
                xaxis: {
                    categories: ['2011 Q1', '2011 Q2', '2011 Q3', '2011 Q4', '2012 Q1', '2012 Q2', '2012 Q3', '2012 Q4']
                },
                fill: {
                    opacity: 1
                },
                legend: {
                    position: 'right',
                    offsetX: 0,
                    offsetY: 50
                }
            };

            var chart2 = new ApexCharts(document.querySelector("#chart2"), options2);
            chart2.render();
        });
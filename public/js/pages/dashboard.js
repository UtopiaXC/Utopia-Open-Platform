$(document).ready(function () {
    var options1 = {
        chart: {
            height: 350,
            type: 'area',
            toolbar: {
                show: false,
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        colors: ['#9335ce','#1fffa6','#f54e4e'],
        series: [{
            name: '总数',
            data: [16, 28, 7, 8, 8, 39, 45]
        }, {
            name: '成功',
            data: [14, 24, 5, 1, 5, 38, 43]
        }, {
            name: '失败',
            data: [2, 4, 2, 7, 3, 1, 2]
        }],

        xaxis: {
            type: 'date',
            categories: ["2021-08-25", "2021-08-26", "2021-08-27", "2021-08-28", "2021-08-29", "2021-08-30", "2021-08-31"],
            labels: {
                style: {
                    colors: 'rgba(94, 96, 110, .5)'
                }
            }
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        },
        grid: {
            borderColor: 'rgba(94, 96, 110, .5)',
            strokeDashArray: 4
        }
    }
    var chart1 = new ApexCharts(
        document.querySelector("#apex1"),
        options1
    );
    chart1.render();
});

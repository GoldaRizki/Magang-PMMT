@extends('layouts.header')


@section('customCss')
@endsection


@section('konten')
<div class="card card-bordered">
    <div class="card-body">
        <div id="kt_apexcharts_1" style="height: 450px;"></div>
    </div>
</div>
@endsection


@section('customJs')

<script>
var element = document.getElementById('kt_apexcharts_1');

var height = parseInt(KTUtil.css(element, 'height'));
var labelColor = KTUtil.getCssVariableValue('--bs-gray-700');
var borderColor = KTUtil.getCssVariableValue('--bs-gray-400');
var baseColor = KTUtil.getCssVariableValue('--bs-primary');
var secondaryColor = KTUtil.getCssVariableValue('--bs-warning');
var warnaKetiga = KTUtil.getCssVariableValue('--bs-info');

console.log('isine adalah :' + borderColor);


var options = {
    series: [{
        name: 'Target',
        data: [50, 2, 4, 59, 69, 21]
    }, {
        name: 'Realisasi',
        data: [6, 82, 45, 67, 87, 105]
    }, { 
        name: 'Apalah',
        data: [34, 32, 54, 94, 12, 31]
    }, 

],
    chart: {
        fontFamily: 'inherit',
        type: 'bar',
        height: height,
        toolbar: {
            show: false
        }
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: ['30%'],
            endingShape: 'rounded'
        },
    },
    legend: {
        show: true
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    xaxis: {
        categories: ['Yanto', 'Marini', 'April', 'Mei', 'Juminten', 'Juliyanti'],
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false
        },
        labels: {
            style: {
                colors: labelColor,
                fontSize: '12px'
            }
        }
    },
    yaxis: {
        labels: {
            style: {
                colors: labelColor,
                fontSize: '12px'
            }
        }
    },
    fill: {
        opacity: 1
    },
    states: {
        normal: {
            filter: {
                type: 'none',
                value: 0
            }
        },
        hover: {
            filter: {
                type: 'none',
                value: 0
            }
        },
        active: {
            allowMultipleDataPointsSelection: false,
            filter: {
                type: 'none',
                value: 0
            }
        }
    },
    tooltip: {
        style: {
            fontSize: '12px'
        },
       
    },
    colors: [baseColor, secondaryColor, warnaKetiga],
    grid: {
        borderColor: borderColor,
        strokeDashArray: 4,
        yaxis: {
            lines: {
                show: true
            }
        }
    }
};

var chart = new ApexCharts(element, options);
chart.render();
    </script>
@endsection
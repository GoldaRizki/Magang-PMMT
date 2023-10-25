@extends('layouts.header')

@section('konten')


    <div class="card card-bordered">
        <div class="card-header border-0 pt-5">
            <h1 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-1 mb-1">LAPORAN</span>
                <span class="text-muted fw-bold fs-7">Perbandingan antara apa dengan apa</span>
            </h1>
        </div>
        <div class="card-body">
            <div id="kt_apexcharts_1" style="height: 420px;"></div>
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



var options = {
    series: [{
        name: 'Rencana',
        data: [50, 2, 4, 59, 69, 21, 32, 6, 17, 5, 12, 24]
    }, {
        name: 'Realisasi',
        data: [6, 82, 45, 67, 87, 105, 34, 56, 23, 45, 67, 34]
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
            columnWidth: ['50%'],
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
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false
        },
        labels: {
            style: {
                colors: labelColor,
                fontSize: '15px'
            }
        }
    },
    yaxis: {
        labels: {
            style: {
                colors: labelColor,
                fontSize: '14px'
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
            fontSize: '16px'
        },
       
    },
    colors: [baseColor, secondaryColor],
    grid: {
        borderColor: borderColor,
        strokeDashArray: 4,
        yaxis: {
            lines: {
                show: true
            }
        }
    },
    legend:{
        fontSize: '20px',
        itemMargin: {
          horizontal: 10,
          vertical: 0
      },
    }
};

var chart = new ApexCharts(element, options);
chart.render();
    </script>
@endsection
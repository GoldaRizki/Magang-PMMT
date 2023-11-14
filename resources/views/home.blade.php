@extends('layouts.header')

@section('konten')

@include('partials.modalReminder')




									
									
								<!--begin::Row-->
								<div class="row g-5 g-xl-8">
									<div class="col-xl-3">
										<!--begin::Statistics Widget 5-->
										<a class="card bg-danger hoverable card-xl-stretch mb-xl-8" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
											<!--begin::Body-->
											<div class="card-body">
                                                @if($terlambat->count() > 0 and $terlambat->count() < 100)
                                                <span class="position-absolute top-0 fs-3 start-100 p-7 translate-middle badge badge-circle badge-warning">{{ $terlambat->count() }}</span>
                                                @elseif($terlambat->count() > 100)
                                                <span class="position-absolute top-0 fs-3 start-100 p-7 translate-middle badge badge-circle badge-warning">99+</span>
                                                @endif
												<!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
												<span class="svg-icon svg-icon-light svg-icon-3x ms-n1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 16 16">
                                                        <path d="M6.146 7.146a.5.5 0 0 1 .708 0L8 8.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 9l1.147 1.146a.5.5 0 0 1-.708.708L8 9.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 9 6.146 7.854a.5.5 0 0 1 0-.708z" fill="black" />
                                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" fill="black" />
                                                      </svg>
												</span>
												<!--end::Svg Icon-->
												<div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5">TERLAMBAT</div>
												<div class="fw-bold text-gray-200">Maintenance yang melebihi tanggal rencana</div>
											</div>
											<!--end::Body-->
										</a>
										<!--end::Statistics Widget 5-->
									</div>
									<div class="col-xl-3">
										<!--begin::Statistics Widget 5-->
										<a class="card bg-dark hoverable card-xl-stretch mb-xl-8" data-bs-toggle="modal" data-bs-target="#kt_modal_2">
											<!--begin::Body-->
											<div class="card-body">
                                                @if($hari_ini->count() > 0 and $hari_ini->count() < 100)
                                                <span class="position-absolute top-0 fs-3 start-100 p-7 translate-middle badge badge-circle badge-warning">{{ $hari_ini->count() }}</span>
                                                @elseif($hari_ini->count() > 100)
                                                <span class="position-absolute top-0 fs-3 start-100 p-7 translate-middle badge badge-circle badge-warning">99+</span>
                                                @endif
												<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
												<span class="svg-icon svg-icon-light svg-icon-3x ms-n1">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" class="bi bi-calendar-check-fill" viewBox="0 0 16 16">
                                                        <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" fill="black"/>
                                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" fill="black"/>
                                                    </svg>
												</span>
												<!--end::Svg Icon-->
												<div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5">HARI INI</div>
												<div class="fw-bold text-gray-100">Maintenance Pada Hari Ini</div>
											</div>
											<!--end::Body-->
										</a>
										<!--end::Statistics Widget 5-->
									</div>
									<div class="col-xl-3">
										<!--begin::Statistics Widget 5-->
										<a class="card bg-info hoverable card-xl-stretch mb-xl-8" data-bs-toggle="modal" data-bs-target="#kt_modal_3">
											<!--begin::Body-->
											<div class="card-body">
                                                @if($seminggu->count() > 0 and $seminggu->count() < 100)
                                                <span class="position-absolute top-0 fs-3 start-100 p-7 translate-middle badge badge-circle badge-warning">{{ $seminggu->count() }}</span>
                                                @elseif($seminggu->count() > 100)
                                                <span class="position-absolute top-0 fs-3 start-100 p-7 translate-middle badge badge-circle badge-warning">99+</span>
                                                @endif

												<!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                                <span class="svg-icon svg-icon-light svg-icon-3x ms-n1">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" class="bi bi-calendar-check-fill" viewBox="0 0 16 16">
                                                        <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" fill="black"/>
                                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" fill="black"/>
                                                      </svg>
												</span>
												<!--end::Svg Icon-->
												<div class="text-white fw-bolder fs-2 mb-2 mt-5">7 HARI</div>
												<div class="fw-bold text-white">Maintenance dalam 7 hari kedepan</div>
											</div>
											<!--end::Body-->
										</a>
										<!--end::Statistics Widget 5-->
									</div>
									<div class="col-xl-3">
										<!--begin::Statistics Widget 5-->
										<a class="card bg-success hoverable card-xl-stretch mb-5 mb-xl-8" data-bs-toggle="modal" data-bs-target="#kt_modal_4">
											<!--begin::Body-->
											<div class="card-body">
                                                @if($sebulan->count() > 0 and $sebulan->count() < 100)
                                                <span class="position-absolute top-0 fs-3 start-100 p-7 translate-middle badge badge-circle badge-warning">{{ $sebulan->count() }}</span>
                                                @elseif($sebulan->count() > 100)
                                                <span class="position-absolute top-0 fs-3 start-100 p-7 translate-middle badge badge-circle badge-warning">99+</span>
                                                @endif
												<!--begin::Svg Icon | path: icons/duotune/graphs/gra007.svg-->
												<span class="svg-icon svg-icon-light svg-icon-3x ms-n1">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" class="bi bi-calendar-check-fill" viewBox="0 0 16 16">
                                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5h16V4H0V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5z" fill="black"/>
                                                      </svg>
												</span>
												<!--end::Svg Icon-->
												<div class="text-white fw-bolder fs-2 mb-2 mt-5">30 HARI</div>
												<div class="fw-bold text-white">Maintenance dalam 30 hari mendatang</div>
											</div>
											<!--end::Body-->
										</a>
										<!--end::Statistics Widget 5-->
									</div>
								</div>
								<!--end::Row-->

    <div class="card card-bordered">
        <div class="card-header border-0 pt-5">
            <h1 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-1 mb-1">RENCANA & REALISASI</span>
                <span class="text-muted fw-bold fs-7">Tahun : {{ now(7)->year }}</span>
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
        data: [ @for($i = 1; $i <= 12; $i++)@if($chart_rencana->get($i)){{$chart_rencana->get($i)}},@else 0,@endif @endfor ]
    }, {
        name: 'Realisasi',
        data: [@for($i = 1; $i <= 12; $i++)@if($chart_realisasi->get($i)){{$chart_realisasi->get($i)}},@else 0,@endif @endfor ]
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
@extends('layouts.header')

@section('customCss')
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/>
    <style>
        .tombolAksi{
        min-width: 180px;
        }
        .dataTables_filter input[type="search"]{
        background-color: white;
        }

        .dataTables_filter input[type="search"]:focus{
        background-color: #e0e0e0;
        }

        .dataTables_wrapper .dataTables_length select{
        background-color: white !important;
        }
        .dataTables_processing{
            z-index: 5;
        }
    </style>


@endsection

@section('konten')
    
<div class="container-fluid row my-3">

    <div class="col-lg-1"> 
    </div>
    
    <div class="col-lg-10">
        <div class="container text-center">
            @yield('customAddData')
        </div>

            <table id="tabelTemplate" class="table align-middle table-row-bordered table-row-gray-400 gy-2 gs-7 gx-1">
                <thead>
                    <tr class="fw-bolder fs-6 text-gray-800">
                    @yield('tableHead')
                </tr>
        </thead>
        <tbody> 
        </tbody>
    </table>
    
    </div>

    <div class="col-lg-1"></div>

</div>

@endsection


@section('customJs')

@yield('data')

@yield('customJs2')

@endsection


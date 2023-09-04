@extends('layouts.header')

@section('customCss')
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/>
    <style>
        .tombolAksi{
        min-width: 180px;
        }
    </style>
@endsection

@section('konten')
    
<div class="container-fluid row my-3">
    
    <div class="col-md-3"></div>
    <div class="col-md-6">
    
        <div class="container text-center">
            @yield('customAddData')
        </div>
        
    <table id="tabelTemplate" class="table table-row-bordered table-row-gray-400 gy-3 gs-7 gx-1">
        <thead>
                <tr class="fw-bolder fs-6 text-gray-800">
                    @yield('tableHead')
                </tr>
        </thead>
        <tbody>
            @yield('tableBody')
        </tbody>
    </table>

    </div>

    <div class="col-md-3"></div>

</div>

@endsection


@section('customJs')
<script>

    $('#tabelTemplate').DataTable({
responsive: true

    });
  

</script>
@endsection

@yield('customJs2')
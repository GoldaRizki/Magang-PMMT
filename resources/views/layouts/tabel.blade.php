@extends('layouts.header')

@section('isi')
    
    <div class="container my-5">
    <table id="tabelTemplate" class="table table-sm table-bordered table-striped small dt-responsive dataTable no-footer dtr-inline collapsed" style="width:100%">
        
        @yield('tableTemplate')

    </table>

</div>

@endsection
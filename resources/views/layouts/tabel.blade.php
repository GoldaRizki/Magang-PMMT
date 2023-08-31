@extends('layouts.header')

@section('konten')
    
    <div class="container my-3">

        
    <table id="tabelTemplate" class="table table-row-bordered table-row-gray-400 gy-3 gs-7">
        <thead>
            <tr class="fw-bolder fs-6 text-gray-800">
        
        @yield('tableTemplate')

    </table>

</div>

        @yield('afterTable')


@endsection

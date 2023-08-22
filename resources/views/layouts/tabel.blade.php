@extends('layouts.header')

@section('isi')
    
    <div class="container my-3">

        
    <table id="tabelTemplate" class="table table-sm w-100">
        
        @yield('tableTemplate')

    </table>

</div>

@yield('afterTable')

@endsection

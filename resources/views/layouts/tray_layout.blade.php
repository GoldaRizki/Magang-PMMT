@extends('layouts.header')

@section('customCss')

    @yield('customCss')

@endsection

@section('konten')
    
@yield('before_content')


    <div class="row">

        <div class="col-lg-3 mb-3 p-4">
            @yield('content_left')
        </div>

        <div class="col-lg-9">
            @yield('content_right')
        </div>
    

    </div>

@endsection


@section('customJs')
    @yield('customJs')
@endsection


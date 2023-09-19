@extends('layouts.header')

@section('customCss')

    @yield('customCss')

@endsection

@section('konten')
    
@yield('before_content')

<div class="container">

    <div class="row">

        <div class="col-md-4 mb-3 p-4">
            @yield('content_left')
        </div>

        <div class="col-md-8">
            @yield('content_right')
        </div>
    

    </div>
</div>

@endsection


@section('customJs')
    @yield('customJs')
@endsection

